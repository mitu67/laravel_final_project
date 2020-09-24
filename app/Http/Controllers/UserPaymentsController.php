<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\PaymentRequest;
use App\User;
use App\Payment;
use Illuminate\Support\Facades\Session;

class UserPaymentsController extends Controller
{
       public function __construct()
{
	$this->data['tab_menu'] = 'payments';
}



    public function index($id)
    {
    	$this->data['user'] = User::findOrFail($id);

    	//$this->data['sales'] = $user->sales;  // user r sales er relation USER MODEL  a 


    	return view('users.payments.payments' , $this->data);
    }

    public function store(Request $request, $user_id)
    {
    	$data = $request->all();
    	$data['user_id'] = $user_id;

    	    if (Payment::create($data) ){
            Session::flash('message','Payment Added successfully');
        }

        return redirect()->route('user.payments' , ['id' => $user_id]);

    }

    public function destroy($user_id , $payment_id)
    {
    	

    	   if (Payment::destroy($payment_id) ){
            Session::flash('message','Payment Deleted successfully');
        }

        return redirect()->route('user.payments' , ['id' => $user_id]);

    }




}
