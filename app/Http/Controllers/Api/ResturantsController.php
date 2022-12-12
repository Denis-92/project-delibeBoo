<?php

namespace App\Http\Controllers\Api;

use App\Resturant;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Error;

class ResturantsController extends Controller
{
    public function index()
    {
        try {
            $resturants = Resturant::all();
            $categories = Category::all();
            $data = [
                'ristoranti' => $resturants,
                'categorie' => $categories,
                'success' => count($resturants) > 0
            ];
        } catch (Error $e) {
            $data = [
                'error' => $e->messagge,
                'success' => false
            ];
        };

        return response()->json($data);
    }
}
