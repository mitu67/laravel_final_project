<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  protected $fillable = ['title'];


public function products()
{
	return $this->hasMany(product::class);
}

public static function listForSelect()
{
	$arr = [];
	$categories = Category::all();
	foreach ($categories as $category) {
		$arr[$category->id] = $category->title;
	}

	return $arr;
}


}
