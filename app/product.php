<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Product extends Model
{

    protected $fillable = ['title','description', 'category_id', 'cost_price' , 'price' , 'has_stock'];


    public  function category()
    {
    	return $this->belongsTo(category::class);
    	
    }


    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }



    public function saleItems()
    {
        return $this->hasMany(SaleItem::class);
    }

    
    public static function listForSelect()
    {
    	$arr = [];
    	$products = Product::all();

    	foreach ($products as $product) {
    		$arr[$product->id] = $product->title;
    	}

    	return $arr;

    }
    

   }
