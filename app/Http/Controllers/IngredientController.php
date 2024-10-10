<?php

namespace App\Http\Controllers;

use App\Models\IngredientCategory;
use Illuminate\Http\Request;
use App\Models\Ingredient;

class IngredientController extends Controller
{
    public function add(){
        $ingredientcategories =IngredientCategory::get();
        return view('Admin.Ingredients.Add', compact('ingredientcategories'));
    }

    public function store(Request $request){
    
        $result=Ingredient::create($request->all());

        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $ingredient=Ingredient::with(['ingredientcategory'])->orderBy('id','DESC')->paginate($limit);
    
        return view('Admin.Ingredients.List',data:[
            'ingredients'=> $ingredient,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }

    public function list(Request $request){
        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $ingredient=Ingredient::with(['ingredientcategory'])->orderBy('id','DESC')->paginate($limit);

        return view('Admin.Ingredients.List',data:[
            'ingredients'=> $ingredient,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }

    public function update($id){
        $ingredient = Ingredient::find($id);
        return view('Admin.Ingredients.update',compact('ingredient'));
     }

     public function change( Request $request){    
        $id = $request->id;
        $ingredient=Ingredient::find($id);

        $ingredient->name=$request->name;
        $ingredient->initial_stock=$request->initial_stock;
        $ingredient->unit=$request->unit;
        $ingredient->save();
        return redirect('Ingredient/list');
     }

     public function delete($id){
     Ingredient::find($id)->forceDelete();
        return  redirect('Ingredient/list');
     }
}
