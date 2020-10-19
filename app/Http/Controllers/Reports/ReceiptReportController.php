<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Receipt;

class ReceiptReportController extends Controller
{
     public function index(Request $request)
    {
    	//$start_date = $request->get('start_date' , date('y-m-d'));
    	
    	$this->data['start_date'] = $request->get('start_date' , date('y-m-d'));
    	$this->data['end_date'] = $request->get('end_date' , date('y-m-d'));

		$this->data['receipts'] = Receipt::whereBetween('date' ,[$this->data['start_date'] , $this->data['end_date']] )
		    ->get();
    	;

    	return view('reports.receipts' , $this->data); 

    }
}
