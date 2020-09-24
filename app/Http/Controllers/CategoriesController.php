<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateRequest;

use App\Category;
use Illuminate\Support\Facades\Session;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        return view('Category.categories' ,$this->data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['headline'] = " Add new category ";
       return view('category.form' , $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data= $request->all();
        if(Category::create($data)){
           // session::flash('message','category added successfully');
            session::flash('message',$data['title'] . ' ' . 'added successfully');
        }
        return redirect()->to('categories');
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['category'] = Category::find($id);
        $this->data['headline'] = 'Update Category';
        return view('category.form' , $this->data);
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

       $category               = Category::find($id);
       
       $category->title         = $data['title'];
     

         if ($category->save()){
            Session::flash('message','Category Updated successfully');
        }

        return redirect()->to('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Category::find($id)->delete() ){
            Session::flash('message','category Deleted successfully');
        }

        return redirect()->to('categories');
    }
}
