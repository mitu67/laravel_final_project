<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserPurchasesController extends Controller
{
    public function __construct()
{
	$this->data['tab_menu'] = 'purchases';
}



    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);

    	//$this->data['sales'] = $user->sales;  // user r sales er relation USER MODEL  a 


    	return view('users.purchases.purchases' , $this->data);
    }
}
