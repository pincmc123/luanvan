<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\product;
use App\Models\order;
use Illuminate\Http\Request;
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
        return redirect()->route('homeuser')->with('success','Đặt hàng thành công');
    }
    public function createPayment(Request $request)
    {

    }

}
