<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Origin;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('media.index', [
            "title" => "Media",
            "main" => "Media",
            'active' =>  'media',
            'medias' => Media::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medias = Media::findOrFail($id);
        return view('media.show',[
            "title" => "Media",
            "main" => "Media",
            'active' =>  'media',
            'media' => $medias,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Media $media)
    {
        //
    }
}
