<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use Illuminate\Http\Request;

class ApiAnimalController extends Controller
{

    public function index(){
        $animal=Animal::all();
        return $animal;
    }
    public function create(Request $request){
        try {
            $request->validate([
                'name' => 'required',
                'quantity' => 'required',
                'feeds' => 'required',
                'note' => 'required',
            ]);

            $user = $request->user();
            $animal = new Animal();
            $animal->name = $request->input('name');
            $animal->quantity = $request->input('quantity');
            $animal->feeds = $request->input('feeds');
            $animal->note = $request->input('note');
            $animal->created_by = $user->id;
            $animal->save();
            // Return error response
            return response()->json([
                'message' => 'Animal addedd successsfully',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating item: ' . $e->getMessage()
            ], 500);
        }

        
    }
    public function update(Request $request,$id){
        $animal=Animal::findorFail($id);
        $request->validate([

        ]);
        $animal->name = $request->input('name');
        $animal->quantity = $request->input('quantity');
        $animal->feeds = $request->input('feeds');
        $animal->note = $request->input('note');

        $animal->update();

        return "animal updated successfully";
    }
    public function show(Request $request,$id){
        $animal=Animal::findorFail($id);
        $request->validate([

        ]);
        $animal->update();

        return $animal;
    }
    public function delete(Request $request,$id){
        $animal = Animal::find($id);
        if (!$animal) {
            return "Error: Unable to delete animal.Not found";
        }

        $animal->delete();

        return "animal deleted successfully";
    }

}
