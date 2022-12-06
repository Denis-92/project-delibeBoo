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
        'restaurant_id'
    ];

    // TODO
    // public function restaurant() {
    //     return $this->belongsTo('App\Restaurant');
    // }
}
