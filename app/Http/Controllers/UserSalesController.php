<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\InvoiceRequest;
use App\User;
use App\Product;
use App\SaleInvoice;
use App\SaleItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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
              // store er jonno.

    public function createInvoice(Request $request , $user_id)
    {
    	$data = $request->all();

    	$data['user_id'] = $user_id;
    	$data['admin_id'] = Auth::id();

    	if($invoice = SaleInvoice::create($data));

    	return redirect()->route('user.sales.invoice_details', ['id' => $user_id ,'invoice_id' => $invoice->id]);

    }




    public function  invoice($user_id , $invoice_id)
    {
    	$this->data['user'] = User::findOrFail($user_id);
    	$this->data['invoice'] = SaleInvoice::findOrFail($invoice_id);
    	$this->data['products'] = Product::listForSelect();

    	return view('users.sales.invoice' , $this->data);

    }

    public function addItem(Request $request ,$user_id , $invoice_id)
    {
    	$data = $request->all();
    	$data['sale_invoice_id'] = $invoice_id;

    	if( SaleItem::create($data) ){
    		Session::flash('message' , 'Item Added Successfully');
    	}

    	return redirect()->route('user.sales.invoice_details', ['id' => $user_id ,'invoice_id' => $invoice_id]);

    }

    public function destroyItem($user_id , $invoice_id, $item_id)
    {
    	if(SaleItem::destroy($item_id)){
    		Session::flash('message' , 'Item Deleted Successfully');
    	}

    	return redirect()->route('user.sales.invoice_details' ,  ['id' => $user_id ,'invoice_id' => $invoice_id]);
    }


       public function destroy($user_id , $invoice_id)
    {
    	if(SaleInvoice::destroy($invoice_id)){
    		Session::flash('message' , 'invoice Deleted Successfully');
    	}

    	return redirect()->route('user.sales' ,  ['id' => $user_id] );
    }


}
