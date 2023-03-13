<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.ad_animal_create');
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
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
          
          $animal = Animal::findorFail($id);
          return view('admin.ad_animal_edit',['animal'=>$animal]);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showanimals()
    {
        $animals = Animal::all();
        return view('admin.animal', compact('animals'));
    }
}
