<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


         /*MODEL USE HOY DB THEKE COLUMN NAME FILL KORE DEOUR JONNO  */

class Group extends Model
{
    protected $fillable = ['title'];

         // 1ta group a akadhik user thakte pare
    public function users()
    {
        return $this->hasMany(User::class);
    }






    public static function listForSelect(){

    	$arr = [];

    	 $groups = Group::all();

       // $this->data['groups'] = [];

        foreach ($groups as $group){

           $arr[$group->id] = $group->title;
        }

        return $arr;
    }

    
}
