<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Resturant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('admin.resturants.create');
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
        $newResturant = new Resturant();
        $newResturant->fill($inputCreate);
        $slug = $this->getSlug($newResturant->name, $resturant);
        $newResturant->slug = $slug;
        $user = Auth::user();
        $newResturant->user_id = $user->id;
        $newResturant->save();
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
        return view('admin.resturants.edit', compact('resturant'));
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
        $resturant->update($resturantUpdate);
        return redirect()->route('admin.resturants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Resturant  $resturant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resturant $resturant)
    {
        $resturant->delete();
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
