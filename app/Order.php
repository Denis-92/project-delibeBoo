<?php

namespace App;

use App\Plate;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates()
    {
        return $this->belongsToMany('App\Plate');
    }
    protected $fillable = ['total-price', 'date', 'address', 'pieces', 'email', 'phone-number'];
}
