<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function loginAccept(Request $request)
    {
        $loginState = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth('web')->attempt($loginState)) {
            return redirect(route('admin.home'));
        }else{
            return redirect(route('admin.login'));
        }
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect(route('admin.login'));
    }


}
