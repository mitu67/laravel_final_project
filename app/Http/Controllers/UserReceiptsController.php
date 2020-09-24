<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserReceiptsController extends Controller
{
          public function __construct()
{
	$this->data['tab_menu'] = 'receipts';
}



    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);

    	//$this->data['sales'] = $user->sales;  // user r sales er relation USER MODEL  a 


    	return view('users.receipts.receipts' , $this->data);
    }
}
