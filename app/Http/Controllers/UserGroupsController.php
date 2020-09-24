<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;



class UserGroupsController extends Controller
{

/*  
user er list show  
dekhabo view te
group show korar jonno group view nilam
Group ta (model )a fill kore dite hobe
index+model+view[MVC]
*/
    
    public function index()
    {
    	$this->data['groups'] = Group::all();
    	return view('groups.groups', $this->data);
    }

/*  
new user create 
Group ta model a fill kore dite hobe
*/

     public function create()
    {
    	$this->data['groups'] = Group::all();
    	return view('groups.create');
    }

    /*  
        1.create page er data group a store hobe that means action group a
        2. session message [flash]
        3.Group::create($formData) means group a datagula create kore store korlam
    */

     public function store(Request $Request)
    {
    	$formData= $Request->all();
    	if (Group::create($formData) ){
    		Session::flash('message','Group created successfully');
    	}

    	return redirect()->to('groups');
    }

    /*  
    1.user delete group page theke
    2.id dia delete korbo
    3.session use
    */

     public function destroy($id)
    {
    	
    	if (Group::find($id)->delete()) {
    		Session::flash('message','Group deleted successfully');
    	}

    	return redirect()->to('groups');
    }
}
