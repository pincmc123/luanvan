<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('Admin.index');
    }
    public function index1()
    {
        $user = Auth::user();
        return view('Customer.index');
    }
}
