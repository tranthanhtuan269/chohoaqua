<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'images', 'price', 'category'];

    public function category()
    {
        return $this->belongsTo('Category');
    }
}
