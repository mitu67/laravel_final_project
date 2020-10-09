<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvoiceRequest;
use Illuminate\Http\Request;
use App\User;
use App\PurchaseInvoice;
use App\Product;
use App\PurchaseItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


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


    public function createInvoice(Request $request , $user_id)
    {

        $data = $request->all();

        $data['user_id'] = $user_id;
        $data['admin_id'] = Auth::id();

        if( $invoice = PurchaseInvoice::create($data)){
        	Session::flash('message' , "created successfully");
        }
        // create line a $invoice and rpute a eta neoua hoyese jate .invoice_details page a jay

       return redirect()->route('user.purchases.invoice_details' , ['id' =>$user_id , 'invoice_id' => $invoice]);



        //purchase er CRUD page a jay

       // return redirect()->route('user.purchases' , ['id' =>$user_id ]);
    }

    public function invoice($user_id , $invoice_id)
    {
    	$this->data['user'] = User::findOrFail($user_id);
    	$this->data['invoice'] = PurchaseInvoice::findOrFail($invoice_id);
    	$this->data['products'] = Product::listForSelect();


    	return view('users.purchases.invoice' , $this->data);

    }

    public function addItem(Request $request , $user_id , $invoice_id)
    {
    	$data = $request->all();
    	$data['purchase_invoice_id'] = $invoice_id;

    	if(PurchaseItem::create($data)){
    		Session::flash('message' , 'item Added Successfully');
    	}

    return redirect()->route('user.purchases.invoice_details' , ['id' =>$user_id , 'invoice_id' => $invoice_id]);

  
    }

    public function destroyItem($user_id , $invoice_id , $item_id)
    {
    	if(PurchaseItem::destroy($item_id)){
    		Session::flash('message' , 'Item deleted Successfully');
    	}

    return redirect()->route('user.purchases.invoice_details' , ['id' =>$user_id , 'invoice_id' => $invoice_id]);
    }


    public function destroy($user_id , $invoice_id )
    {
    	if(PurchaseInvoice::destroy($invoice_id)){
    		Session::flash('message', 'invoice deleted Successfully');
    	}

    	return redirect()->route('user.purchases' , ['id' => $user_id]);
    }

}
