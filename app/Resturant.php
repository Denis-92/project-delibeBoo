<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Resturant extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
    public  $fillable = ['name', 'address', 'slug', 'image', 'p.iva', 'lunch_opening', 'dinner_opening', 'user_id'];
}
