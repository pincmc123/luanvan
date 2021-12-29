<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('Admin.User', ['data' => $this->user->getListuser()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.AddUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->user->createUser($request);

        return view('Admin.EditUser', ['data' => $user])->with('success', 'Thêm thành công tài khoản');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.EditUser', ['data' => $this->user->getUser($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->user->updateUser($request, $id);
        return redirect()->back();
    }
    public function showregistercustomer()
    {
        return view('Admin.Register');
    }
    public function registercustomer(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password'=> 'required',
            'phone'=>'required'
        ],
            [
                'name.required'=> 'Email không được để trống',
                'email.required'=> 'Tên không được để trống', // custom message
                'phone.required'=> 'số điện thoại không được để trống',
                'password.required'=>'Password không được để trống'
            ]
        );
        $user = $this->user->createCustomer($request);

        return view('Admin.Login', ['data' => $user])->with('success', 'Bạn tạo tài khoản thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->user->destroyUser($id);
        return view('Admin.user')->with('success','Xóa thành công');
    }
}
