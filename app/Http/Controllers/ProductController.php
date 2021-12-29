<?php

namespace App\Http\Controllers;

use App\Models\catalog;
use App\Models\product;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(Product $product){
        $this->product=$product;
    }
    public function index()
    {
        return view('Admin.Product',['data'=>$this->product->getListproduct()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.AddProduct',['datas'=>catalog::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:product',
            'code' => 'required|unique:product',
            'image'=> 'required',
        ],
        [
            'name.required'=> 'Tên không được để trống', // custom message
            'code.required'=> 'Mã không được để trống', // custom message
            'image.required'=>'Hình ảnh không được để trống'
        ]
    );
        /*if ($validated->fails())
        {
            return $validated->withInput()->errors();
        }*/
        $product = $this->product->createProduct($request);


        return redirect()->route('product.index')->with('success','Thêm sản phẩm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.EditProduct', ['data' => $this->product->getProduct($id)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->product->updateProduct($request, $id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->product->destroyproduct($request);
        return redirect()->back()->with('success','Đổi trạng thái thành công');
    }
}
