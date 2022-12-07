<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Plate;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $plates = Plate::all();
            return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.plates.create');
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
        $newPlate = new Plate();
        $newPlate->fill($inputCreate);
        $slug = $this->getSlug($newPlate->name, $plate);
        $newPlate->slug = $slug;
        $newPlate->save();
        return redirect()->route('admin.plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        //
        return view('admin.plates.show', compact('plate'));
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
        //
        $plate->delete();
        return redirect()->route('admin.plates.index');
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
