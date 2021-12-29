<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\orderdetail;

class order extends Model
{
    use HasFactory;
    protected $table='order';
    public $timestamps = false;

    protected $fillable = [
        'status',/* O P D C */
        'user_id',
        'user_name',
        'user_email',
        'user_address',
        'user_phone',
        'amount',
        'message',
    ];
    public function getListorder()
    {
        return order::get();
    }
    public function getOrder($id){
        return order::find($id);
    }


    public function createorder($request)
    {
        $id=null;
        if(Auth::user()&&Auth::user()->role=='user')
            $id=Auth::user()->id;


        $total = 0;
        foreach (session()->get('cart') as $key => $data) {
            $total += product::getproductuser($key)->price * $data;
        }
        $order =  order::insertGetId([
            'status'=>'O',/* O P D C */
            'user_id'=>$id,
            'user_name'=>$request->namecustomer,
            'user_email'=>$request->emailcustomer,
            'user_address'=>$request->address .' '. $request->apt,
            'user_phone'=>$request->phonecustomer,
            'message'=>$request->message,
            'amount'=> $total,
        ]);

        orderdetail::createorderdetail($order);


        return $order;
    }
    public  function updateOrder($data,$id)
    {
        $order=order::find($id);
        $order->status=$data;
        $order->save();
        return 'True';
    }


}
