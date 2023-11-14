<?php

namespace App\Http\Controllers;

use App\Models\Tier;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tier.index', [
            "title" => "Tier",
            "main" => "Tier",
            'active' =>  'tier',
            'tiers' => Tier::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tier.create', [
            "title" => "Tier",
            "main" => "Tier",
            'active' =>  'tier',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tier' => 'required|max:255',
            'slug' => 'required|unique:tiers',
            'deskripsi' => 'required',
        ]);

        Tier::create($validatedData);

        return redirect('/')->with('success','New Tier has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tier $tier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tier $tier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tier $tier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tier $tier)
    {
        //
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Tier::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
