<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('options.animal.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('options.animal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $animal = new Animal();
        $animal->name = $request->name;
        $animal->quantity = $request->qty;
        $animal->feeds = $request->feeds;
        $animal->note = $request->note;
        $animal->created_by=Auth::user()->id;
        $animal->save();
        
        
        return redirect()
        ->back()
        ->with('success', 'Animal has been created successfully!'); 
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
        //
        $animal=Animal::findorFail($id);
        return view('options.animal.edit',compact('animal'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $animal=Animal::findorFail($id);
        $request->validate([
            'name'=>['required'],
        ]);

        $animal->name = $request->name;
        $animal->quantity = $request->qty;
        $animal->feeds = $request->feeds;
        $animal->note = $request->note;

        $animal->update();

         return redirect()
        ->back()
        ->with('success', 'Animal has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
         $animal=Animal::findorFail($id);
         $animal->delete();

         $animals = Animal::all();
         return redirect()
        ->back()
        ->with('success', 'Animal has been deleted successfully!');
        

        
        
    }
}
