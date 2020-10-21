<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsStockController extends Controller
{
    public function index()
    {
    	$this->data['products'] = Product::where('has_stock' , 1)->get();
    	return view('products.stocks' , $this->data);
    }
}
