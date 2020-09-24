<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\ProductRequest;
use Illuminate\Support\Facades\Session;

use App\Product;
use App\Category;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        return view('products.products' , $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['categories'] =  Category::listForSelect();
        $this->data['headline'] = 'Add New Product';
        return view('products.form' , $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if(Product::create($data)) {
            Session::flash('message', 'Product Added Successfully');
        }

        return redirect()->to('products');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['product'] = Product::find($id);
        return view('products.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $this->data['product'] = product::findOrFail($id);  // USER model er obj[user]

        $this->data['categories'] =  Category::listForSelect();
        $this->data['headline'] = 'Update Product Information';

        return view('products.form' , $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data               = $request->all(); 

       $product               = Product::find($id);
       $product->category_id     = $data['category_id'];
       $product->title         = $data['title'];
       $product->description        = $data['description'];
       $product->cost_price        = $data['cost_price'];
       $product->price      = $data['price'];

         if ($product->save()){
            Session::flash('message','Product Updated successfully');
        }

        return redirect()->to('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if (Product::destroy($id) ){
            Session::flash('message','Product Deleted successfully');
        }

        return redirect()->to('products');
    }
}
