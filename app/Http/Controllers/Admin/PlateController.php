<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Plate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PlateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->all();
        $restid = array_keys($id);
        $plates = Plate::where('resturant_id', $restid)->get();
        return view('admin.plates.index', compact('plates', "restid"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->all();
        $restid = array_keys($id);
        return view('admin.plates.create', compact('restid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Plate $plate)
    {
        //
        $this->validatePlate($request);
        $inputCreate = $request->all();
        if (array_key_exists('image', $inputCreate)) {
            $inputCreate['image'] = Storage::put('plate_covers', $inputCreate['image']);
        }
        $newPlate = new Plate();
        $newPlate->fill($inputCreate);
        $slug = $this->getSlug($newPlate->name, $plate);
        $newPlate->slug = $slug;
        $newPlate->save();
        return redirect()->route('admin.plates.show', $newPlate->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        $id = $plate->resturant_id;
        return view('admin.plates.show', compact('plate', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        //
        return view('admin.plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        //
        $this->validatePlate($request);
        $form_data = $request->all();
        if ($form_data['name'] != $plate->name) {
            $slug =  $this->getSlug($form_data['name'], $plate);
            $form_data['slug'] = $slug;
        }
        if (array_key_exists('image', $form_data)) {
            if ($plate->image) {
                Storage::delete($plate->image);
            }
            $form_data['image'] = Storage::put('plate_covers', $form_data['image']);
        }
        $plate->update($form_data);
        return redirect()->route('admin.plates.show', $plate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $urlprev = URL::previous();
        $plate->orders()->sync([]);
        if ($plate->image) {
            Storage::delete($plate->image);
        }
        $plate->delete();
        return redirect($urlprev);
    }

    private function validatePlate(request $request)
    {
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:3|max:255',
            'price' => 'required|numeric',
            'hidden' => 'required',
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
