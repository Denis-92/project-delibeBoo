<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Resturant extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function plates()
    {
        return $this->hasMany('App\Plate');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public  $fillable = ['name', 'address', 'slug', 'image', 'p_iva', 'lunch_opening', 'lunch_closing', 'dinner_closing', 'dinner_opening', 'user_id'];
}
