<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('Auth.register');
    }
    public function PostRegister(AuthRequest $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $checkemail = User::where('email',$user->email)->first();
        if($checkemail){
            return back()->with('success','email da ton tai');
        }
        $user->save();
        return redirect('/login')->with('success','dang ky thanh cong');
    }
    public function login(){
        return view('Auth.login');
    }
    public function PostLogin(AuthRequest $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($data)){
            return redirect()->route('employee.index')->with('success','dang nhap thanh cong');
        }
        return back()->with('success','tài khoản hoặc mật khẩu không chính xác');
    }
    public function SignOut (){
        Auth::logout();
        return redirect()->route('login');
    }
}
