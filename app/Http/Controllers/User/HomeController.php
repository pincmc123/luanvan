<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\product;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function __construct(order $order)
    {
        $this->order = $order;
    }
    public function index()
    {
        $user = Auth::user();
        return view('Admin.index');
    }


    public function index1()
    {
        // $user = Auth::user();
        return view('Customer.index', ['datas' => product::getall()]);
    }

    public function catagory($id)
    {
        return view('Customer.Catagorey',['datas'=>product::getproductcatalog($id)]);
    }

    public function product($id)
    {
        return view('Customer.Product', ['datas' => product::getproductuser($id)]);
    }

    public function addcart($id, Request $request)
    {
        /*  if (session($id))
              session()->put($id, $request->quantity + session($id));
          else
              session()->put($id, $request->quantity);*/
        $cart = session('cart');
        if (!isset($cart[$id]))
            $cart[$id] = $request->quantity;
        else
            $cart[$id] = $request->quantity + $cart[$id];
        session()->put('cart', $cart);
        return redirect()->back();


    }

    public function viewcart()
    {
        $cartitem = [];
        $stt = 0;
        $total = 0;
        foreach (session()->get('cart') as $key => $data) {
            $cartitem[$stt] = product::getproductuser($key);
            $cartitem[$stt]['quantity'] = $data;
            $total += product::getproductuser($key)->price * $data;
            $stt++;
        }
        return view('Customer.Cart', ['datas' => $cartitem, 'total' => $total]);
    }

    public function updatecart(Request $request)
    {
        $cart = [];
        foreach ($request->cart as $key => $value) {
            if ($value == 0)
                continue;
            $cart[$key] = $value;
        }
        session()->put('cart', $cart);
        return redirect()->route('viewcart');

    }

    public function checkout()
    {
        $cartitem = [];
        $stt = 0;
        $total = 0;
        foreach (session()->get('cart') as $key => $data) {
            $cartitem[$stt] = product::getproductuser($key);
            $cartitem[$stt]['quantity'] = $data;
            $cartitem[$stt]['sum']=product::getproductuser($key)->price * $data;
            $total += product::getproductuser($key)->price * $data;
            $stt++;
        }
        return view('Customer.Checkout',['datas' => $cartitem, 'total' => $total]);
    }
    public function search(Request $search)
    {
      return view('Customer.Search',['datas'=> product::getnameproduct($search->search)]);
    }

    public function addcheckout(Request $request){
        $order = $this->order->createorder($request);
        $this->sendOrderConfirmationMail($order);
        return redirect()->route('homeuser')->with('success','Đặt hàng thành công');
    }
    public function createPayment(Request $request)
    {

        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "I69HHFFR"; //Mã website tại VNPAY
        $vnp_HashSecret = "BZYCKNAMWSZKEZGPKTODVPUEJUEIHFEH"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8000/return-vnpay";
        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }
    public function return(Request $request)
    {
        $url = session('url_prev','/');
        if($request->vnp_ResponseCode == "00") {
            $this->apSer->thanhtoanonline(session('cost_id'));
            return redirect($url)->with('success' ,'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors' ,'Lỗi trong quá trình thanh toán phí dịch vụ');
    }
    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->user_email)->send(new OrderMail($order));
    }

}
