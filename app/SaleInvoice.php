<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SaleItem;

class SaleInvoice extends Model
{
    protected $fillable = ['challan_no' , 'date' , 'user_id' , 'admin_id'];


    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }


    public function items()
    {
    	return $this->hasMany(SaleItem::class);
    }

}
