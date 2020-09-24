<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Request\LoginRequest;

class LoginController extends Controller
{
   public function login()
   {

   	$this->data['headline'] = 'login';
   	return view('login.form' , $this->data);
   }

public function authenticate(Request $request)   // login request use korse.
{
	$data = $request->only('email' , 'password');

	if(Auth::attempt($data)){
		return redirect()->intended('dashboard');
	}else{
		return redirect()->route('login')->withErrors(['Invalid Username And Password']);
	}

   }
 public function logout()
 {
 	Auth::logout();

 	return redirect()->route('login');
 }

}
