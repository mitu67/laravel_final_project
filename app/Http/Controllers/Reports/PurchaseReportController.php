<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PurchaseItem;

class PurchaseReportController extends Controller
{
    public function index(Request $request)
    {
    	//$start_date = $request->get('start_date' , date('y-m-d'));
    	
    	$this->data['start_date'] = $request->get('start_date' , date('y-m-d'));
    	$this->data['end_date'] = $request->get('end_date' , date('y-m-d'));

		$this->data['purchases'] = PurchaseItem::select('purchase_items.quantity' , 'purchase_items.price' , 'purchase_items.total' , 'products.title' , 'purchase_invoices.challan_no' , 'purchase_invoices.date')
		    ->join('products' , 'purchase_items.product_id' , '=' , 'products.id')
		    ->join('purchase_invoices' , 'purchase_invoices.id' , '=' , 'purchase_items.purchase_invoice_id')
		    ->whereBetween('purchase_invoices.date' ,[$this->data['start_date'] , $this->data['end_date']] )
		    ->get();
    	;

    	return view('reports.purchases' , $this->data); 

    }
}
