<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderdetail extends Model
{
    use HasFactory;
    protected $table='orderdetail';
    public $timestamps = false;

    protected $fillable = [
        'id_order',/* O P D C */
        'id_product',
        'quantity',
        'price',
        'amount',
    ];
    public function getListorderdetail($id)
    {
        return orderdetail::where('id_order','=',$id)->get();
    }
    public function getOrder($id){
        return orderdetail::find($id);
    }

    public function createorderdetail($id)
    {
        foreach (session()->get('cart') as $key => $data) {
            $orderdetail =  orderdetail::create([
                'id_order'=>$id,
                'id_product'=>product::getproductuser($key)->id,
                'quantity'=>$data,
                'price'=>product::getproductuser($key)->price,
                'amount'=>product::getproductuser($key)->price * $data,
            ]);
        }
        $cart = [];
        session()->put('cart', $cart);
    }
}
