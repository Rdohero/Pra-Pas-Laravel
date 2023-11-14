<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('origin.index', [
            "title" => "Origin",
            "main" => "Origin",
            'active' =>  'origin',
            'origins' => Origin::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('origin.create', [
            "title" => "Origin",
            "main" => "Origin",
            'active' =>  'origin',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'origin' => 'required|max:255',
            'slug' => 'required|unique:origins',
        ]);

        Origin::create($validatedData);

        return redirect('/home')->with('success','New Origin has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Origin $origin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Origin $origin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Origin $origin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Origin $origin)
    {
        //
    }
}
