<?php

namespace App\Http\Controllers\Api;

use App\Resturant;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Error;
use Illuminate\Support\Facades\DB;

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
    public function filtred($url)
    {
        $data = [];
        $input = $url;
        $inputvalue = explode(',', $input);
        foreach ($inputvalue as $valore) {
            $categories = Category::all();
            foreach ($categories as $cat) {
                if ($cat->id == $valore) {
                    foreach ($cat->resturants as $item) {
                        array_push($data, $item);
                    }
                }
            }
        };
        return response()->json($data);
    }

    public function show($id)
    {
        $resturant = Resturant::where('id', $id)->with('plates')->first();
        $data = $resturant;
        return response()->json($data);
    }
}
