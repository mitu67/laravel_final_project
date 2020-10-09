<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseInvoice extends Model
{
    protected $fillable = ['admin_id' , 'user_id' , 'date' , 'challan_no'];



     public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

     public function items()
    {
    	return $this->hasMany(PurchaseItem::class);
    }

      public function payments()
    {
    	return $this->hasMany(Payment::class);
    }

}
