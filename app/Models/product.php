<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable = [
        'name',
        'code',
        'description',
        'image',
        'price',
        'status',
        'id_catalog',
    ];

    public function getListproduct()
    {
        return product::get();
    }
    public function getProduct($id){
        return product::find($id);
    }
    public  function updateProduct($data,$id)
    {
        $product=product::find($id);
        $product->name=$data->name;
        $product->code=$data->code;
        $product->description=$data->description;
        $product->image=$data->image;
        $product->price=$data->price;
        $product->status=$data->status;
        $product->id_catalog=$data->catalog;
        $product->save();
        return 'True';
    }
    public function createProduct($data)
    {



        $imageName = time().'.'.$data->image->extension();
        $data->image->move(public_path('images'), $imageName);

        $product=   product::create([
            'name'=>$data->name,
            'code'=>$data->code,
            'description'=>$data->description,
            'image'=>$imageName,
            'price'=>$data->price,
            'status'=>$data->status,
            'id_catalog'=>$data->catalog,
        ]);
        return $product;
    }
    public function getall()
    {
        return product::where('status','Enable')->get();
    }
    public function getproductuser($id)
    {
        return product::where('code','=',$id)->firstOrFail();
    }
    public  function getnameproduct($search)
    {
        return product::where('name','like','%'.$search.'%')->get();
    }
    public  function getproductcatalog($search)
    {
        return product::where('id_catalog','=',$search)->get();
    }
    public function destroyproduct( $id)
    {
        $product = product::find($id);
        if($product->status == 'Disable')
         $product->status = 'Enable';
        else
            $product->status='Disable';
        $product->save();
    }
}
