<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Plate extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'price',
        'hidden',
        'image',
        'slug',
        'resturant_id',
        'category'
    ];

    public function resturant()
    {
        return $this->belongsTo('App\Resturant');
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
