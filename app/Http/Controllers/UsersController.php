<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\User;
use App\Group;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->data['users'] = User::all();

        return view('users.users', $this->data);
        /**
        $this->data['users'] = User::all();
        return view('users.users', $this->data);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**   
        1..eta LOCAL vabe group a select option create kora

        2..GLOBALLY use korte chaile GROUP MODEL  a FUNCTION CREATE KORE USE KORTE HOBE.
                          
        $groups = Group::all();
        $this->data['groups'] = [];

        foreach ($groups as $group){

           $this->data['groups'][$group->id] = $group->title;
        }
                          x

         */

            /**   FUNCTION call kore use kora jay etai GLOBAL
            1.ekhane arrayForSelect() function jokhon jekhane dorkar use kora jabe.

             */

        $this->data['groups'] =  Group::listForSelect();
        $this->data['headline'] = 'Add New User';
        return view('users.form' , $this->data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
         /**
     * 1. create CreateUserRequest[rules]
     * 2. create fillable[USER MODEL]
     * 3. use session
     * 4. 
     */



       $formData = $request->all(); // $data er moddhy all value nilam

      // User::create($data); //oi data dia 1ta user create korlam.now USER er FILLABLE create.

       if (User::create($formData) ){
            Session::flash('message','user created successfully');
        }

        return redirect()->to('users');

    }

    public function show($id)
    {

        $this->data['user'] = User::findOrFail($id);  // USER model er obj[user]

        $this->data['tab_menu'] = 'user_info';

        return view('users.show' , $this->data);
    }



    public function edit($id)
    {

        $this->data['user'] = User::findOrFail($id);  // USER model er obj[user]

        $this->data['groups'] =  Group::listForSelect();
        $this->data['headline'] = 'Update Information';

        return view('users.form' , $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
       $data               = $request->all(); 

       $user               = User::find($id);
       $user->group_id     = $data['group_id'];
       $user->name         = $data['name'];
       $user->email        = $data['email'];
       $user->phone        = $data['phone'];
       $user->address      = $data['address'];

         if ($user->save()){
            Session::flash('message','User Updated successfully');
        }

        return redirect()->to('users');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        if (User::find($id)->delete() ){
            Session::flash('message','User Deleted successfully');
        }

        return redirect()->to('users');
    }
}
