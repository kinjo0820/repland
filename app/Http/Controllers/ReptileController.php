<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reptile;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ReptileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $reptiles = Reptile::all();

        return view('reptiles.index',['reptiles' => $reptiles]);
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
    public function show(Reptile $reptile,$id)
    {
        //
        
        $reptile = Reptile::where('id', $id)->first();
        $posts = Post::where('reptiles_id', $id)->get();
        return view('reptiles.detail',['reptile' => $reptile,'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reptile $reptile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reptile $reptile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reptile $reptile)
    {
        //
    }
}
