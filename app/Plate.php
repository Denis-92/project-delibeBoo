<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    //
    protected $fillable = [
        'name',
        'description',
        'price',
        'visibility',
        'image',
        'slug',
        'resturant_id'
    ];

    public function resturant() {
        return $this->belongsTo('App\Resturant');
    }
}
