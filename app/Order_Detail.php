<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
	protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = ['name', 'number', 'price', 'order_id', 'product_id'];
}
