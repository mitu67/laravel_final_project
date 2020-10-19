<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SaleItem;

class SaleReportController extends Controller
{
    public function index(Request $request)
    {

    	
    	$this->data['start_date'] = $request->get('start_date' , date('y-m-d'));
    	$this->data['end_date'] = $request->get('end_date' , date('y-m-d'));

		$this->data['sales'] = SaleItem::select('sale_items.quantity' , 'sale_items.price' , 'sale_items.total' , 'products.title' , 'sale_invoices.challan_no' , 'sale_invoices.date')
		    ->join('products' , 'sale_items.product_id' , '=' , 'products.id')
		    ->join('sale_invoices' , 'sale_invoices.id' , '=' , 'sale_items.sale_invoice_id')
		    ->whereBetween('sale_invoices.date' ,[$this->data['start_date'] , $this->data['end_date']] )
		    ->get();


    	;




    	return view('reports.sales' , $this->data); 

    }
}
