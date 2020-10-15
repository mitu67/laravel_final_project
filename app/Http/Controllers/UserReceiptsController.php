<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\ReceiptRequest;

use App\User;
use App\Receipt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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


    public function store(Request $request , $user_id , $invoice_id = null)
    {
    	$data = $request->all();
    	$data['user_id'] = $user_id;
    	$data['admin_id'] = Auth::id();

        // for invoince page +add receipt

        if($invoice_id){
            $data['sale_invoice_id'] = $invoice_id;
        }

                // x 

          //for receipt create 

    	if(Receipt::create($data)){
    		Session::flash('message' , "Receipt added Successfully");
    	}

             // for invoince page +add receipt


        if($invoice_id){
         return redirect()->route('user.sales.invoice_details', ['id' => $user_id ,'invoice_id' => $invoice_id]);
           
        }else{

    	return redirect()->route('users.show' , ['id' => $user_id]);

       }

            // x

    }

    public function destroy($user_id, $receipt_id)
    {

    	   if (Receipt::destroy($receipt_id) ){
            Session::flash('message','Receipt Deleted successfully');
        }

        return redirect()->route('user.receipts' , ['id' => $user_id]);


    }



}
