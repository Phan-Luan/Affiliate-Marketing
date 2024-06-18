<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $login = $request->only('email', 'password');

        if (Auth::attempt($login)) {
            return redirect()->route('ad.index');
        } else {
            session()->flash('error', 'Email hoặc Mật khẩu không chính xác');
            return redirect()->route('ad.login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('ad.login');
    }
}
