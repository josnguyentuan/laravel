<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public  function  loginForm(){
        return view('auth.login');
    }

    public  function login(Request $request){
        $request->validate(
          [
              'email' => [
                  'required', 'email',
              ],
              'password' => 'required'
          ],
          [
                'email.require' => 'Please enter email',
                'email.require' => 'Email is not formated',
                'password.require' => 'Please enter password',
          ]
        );
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended();
        }else {
            return redirect()->back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect(route('category.index'));
    }
}
