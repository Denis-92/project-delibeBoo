<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    public $fillable = ['name'];

    public function resturants()
    {
        return $this->belongsToMany('App\Resturant');
    }
}
