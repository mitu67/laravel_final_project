<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PurchasesInvoice;

class User extends Model
{
	// db er USERS er column gular ja fill korte chai
    protected $fillable = ['group_id' , 'name', 'email', 'phone', 'address'];

         // user 1ta GROUP er odhine thakbe

    public function group()
    {

    	return $this-> belongsTo(Group::class);
    }

    public function sales()
    {
    	return $this->hasMany(SaleInvoice::class);
    }


     public function purchases()
    {
        return $this->hasMany(PurchaseInvoice::class);
    }

     public function payments()
    {
        return $this->hasMany(Payment::class);
    }

     public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }


   
    	
}
