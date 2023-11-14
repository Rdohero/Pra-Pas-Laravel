<?php

namespace App\Http\Controllers;

use App\Models\Characters;
use App\Models\Origin;
use App\Models\Tier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tier = '';
        $title = '';
        $active = '';
        if (request('tier'))
        {
            $tier = Tier::firstWhere('id', request('tier'));
            $title = $tier->tier;
            $active = "tier";
        }else if (request('origin'))
        {
            $origin = Origin::firstWhere('id', request('origin'));
            $title = $origin->origin;
            $active = "origin";
        } else {
            $title = "Characters List";
            $active = "home";
        }

        $characters = Characters::oldest()
            ->filter(request(['tier','origin']))->get();

        return view('home', [
            "title" => $title,
            "main" => $title,
            'active' =>  $active,
            'characters' => $characters,
            'tier' => $tier,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create',[
            "title" => "Characters",
            'active' =>  'home',
            'main' =>  'Characters',
            'tiers' => Tier::all(),
            'origins' => Origin::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'tier_id' => 'required',
            'name' => 'required|max:255',
            'origin_id' => 'required',
            'gender' => 'required|max:255',
            'deskripsi' => 'required',
            'age' => 'required|max:255',
            'classification' => 'required|max:255',
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        Characters::create($validatedData);

        return redirect('/home')->with('success','New Characters has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $characters = Characters::findOrFail($id);
        return view('show',[
            "title" => "Characters",
            "main" => "Characters",
            'active' =>  'home',
            'character' => $characters,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $characters = Characters::findOrFail($id);

        return view('edit',[
            "title" => "Characters",
            "main" => "Characters",
            'active' =>  'home',
            'character' => $characters,
            'origins' => Origin::all(),
            'tiers' => Tier::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $characters = Characters::findOrFail($id);
        $rules = [
            'image' => 'image|file|max:1024',
            'tier_id' => 'required',
            'name' => 'required|max:255',
            'origin_id' => 'required',
            'gender' => 'required|max:255',
            'deskripsi' => 'required',
            'age' => 'required|max:255',
            'classification' => 'required|max:255',
        ];

        $validateData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validateData['image'] = $request->file('image')->store('post-images');
        }

        Characters::where('id', $characters->id)->update($validateData);

        return redirect('/home')->with('success','Characters has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $characters = Characters::findOrFail($id);
        if($characters->image) {
            Storage::delete($characters->image);
        }

        Characters::destroy($characters->id);
        return redirect('/home')->with('success', 'Characters has been deleted!');
    }
}
