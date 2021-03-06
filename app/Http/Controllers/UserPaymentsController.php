<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\PaymentRequest;
use App\User;
use App\Payment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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



    public function store(Request $request, $user_id , $invoice_id = null)
    {
    	$data = $request->all();
    	$data['user_id'] = $user_id;
        $data['admin_id'] = Auth::id();


        if($invoice_id){
            $data['purchase_invoice_id'] = $invoice_id;
        }

    	if (Payment::create($data) ){
            Session::flash('message','Payment Added successfully');
        }


        if($invoice_id){
            return redirect()->route('user.purchases.invoice_details' , ['id' =>$user_id , 'invoice_id' => $invoice_id]);
        }else{
            return redirect()->route('users.show' , ['id' => $user_id]);
        }
     

    }



    public function destroy($user_id , $payment_id)
    {
    	

    	   if (Payment::destroy($payment_id) ){
            Session::flash('message','Payment Deleted successfully');
        }

        return redirect()->route('user.payments' , ['id' => $user_id]);

    }




}
