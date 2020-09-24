<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserSalesController extends Controller
{  

	public function __construct()
{
	$this->data['tab_menu'] = 'sales';
}



    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);

    	//$this->data['sales'] = $user->sales;  // user r sales er relation USER MODEL  a 


    	return view('users.sales.sales' , $this->data);
    }
}
