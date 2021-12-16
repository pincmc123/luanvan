<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='product';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'status',
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
        $product->description=$data->description;
        $product->image=$data->image;
        $product->price=$data->price;
        $product->status=$data->status;
        $product->save();
        return 'True';
    }
    public function createProduct($data)
    {
        $imageName = time().'.'.$data->image->extension();
        $data->image->move(public_path('images'), $imageName);

        $product=   product::create([
            'name'=>$data->name,
            'description'=>$data->description,
            'image'=>$imageName,
            'price'=>$data->price,
            'status'=>$data->status,
        ]);
        return $product;
    }
}
