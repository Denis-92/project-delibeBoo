<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use Illuminate\Support\Facades\Storage;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturants = Resturant::all();
        $user = Auth::user();
        return view("admin.resturants.index", compact(['resturants', 'user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.resturants.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Resturant $resturant)
    {
        $this->validateResturant($request);
        $inputCreate = $request->all();
        if(array_key_exists('image', $inputCreate)) {
            $inputCreate['image'] = Storage::put('resturant_covers', $inputCreate['image']);
        }
        $newResturant = new Resturant();
        $newResturant->fill($inputCreate);
        $slug = $this->getSlug($newResturant->name, $resturant);
        $newResturant->slug = $slug;
        $user = Auth::user();
        $newResturant->user_id = $user->id;
        $newResturant->save();
        if (array_key_exists('categories', $inputCreate)) {
            $newResturant->categories()->sync($inputCreate['categories']);
        };
        if (!is_null($inputCreate['newcat'])) {
            $newcat = new Category;
            $newcat->name = $inputCreate['newcat'];
            $newcat->save();
            $newResturant->categories()->attach($newcat->id);
        }
        return redirect()->route('admin.resturants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function show(Resturant $resturant)
    {
        return view('admin.resturants.show', compact('resturant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function edit(Resturant $resturant)
    {
        $categories = Category::all();
        return view('admin.resturants.edit', compact(['resturant', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resturant $resturant)
    {
        $this->validateResturant($request);
        $resturantUpdate = $request->all();
        if ($resturantUpdate['name'] != $resturant->name) {
            $slug =  $this->getSlug($resturantUpdate['name'], $resturant);
            $resturantUpdate['slug'] = $slug;
        }
        if (array_key_exists('categories', $resturantUpdate)) {
            $resturant->categories()->sync($resturantUpdate['categories']);
        } else {
            $resturant->categories()->sync([]);
        }

        if(array_key_exists('image', $resturantUpdate)) {
            if($resturant->image){
                Storage::delete($resturant->image);
            }
            $resturantUpdate['image']=Storage::put('resturant_cover', $resturantUpdate['image']);

        }


        $resturant->update($resturantUpdate);
        return redirect()->route('admin.resturants.show', compact('resturant'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
        $resturant->categories()->sync([]);
        $resturant->plates()->delete();

        $resturant->delete();
        if($resturant->image) {
            Storage::delete($resturant->image);
        }
        return redirect()->route('admin.resturants.index');
    }
    private function validateResturant(request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'address' => 'required|min:3|max:255',
            'p_iva' => 'required|numeric|min:11', //unique
        ]);
    }
    private function getSlug($title, $model)
    {
        $slug = Str::slug($title);
        $slug_base = $slug;

        $existingPost = $model::where('slug', $slug)->first();
        $counter = 1;
        while ($existingPost) {
            $slug = $slug_base . '_' . $counter;
            $counter++;
            $existingPost = $model::where('slug', $slug)->first();
        }
        return $slug;
    }
}
