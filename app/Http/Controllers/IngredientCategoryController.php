<?php

namespace App\Http\Controllers;

use App\Models\IngredientCategory;
use Illuminate\Http\Request;

class IngredientCategoryController extends Controller
{
    public function add(){
      return view('Admin.Ingredient_category.Add');
    }

    
    public function store(Request $request){
    $result=IngredientCategory::create($request->all());

    $limit = $request['per_page'] ? $request['per_page'] : 10;
    $ingredientcategory=IngredientCategory::orderBy('id','DESC')->paginate($limit);
    return view('Admin.Ingredient_category.List',data:[
      'ingredientcategories'=> $ingredientcategory,
      'perPageOptions' => [10, 20, 50, 100],
         ]);
      }     

      public function list(Request $request){
         $limit = $request['per_page'] ? $request['per_page'] : 10;
         $ingredientcategory=IngredientCategory::orderBy('id','DESC')->paginate($limit);
         return view('Admin.Ingredient_category.List',data:[
            'ingredientcategories'=> $ingredientcategory,
            'perPageOptions' => [10, 20, 50, 100],
         ]);
     }

     public function update($id){
      $ingredientcategory = IngredientCategory::find($id);
      return view('Admin.Ingredient_category.update',compact('ingredientcategory'));
   }

   public function change( Request $request){    
      $id = $request->id;
     $ingredientcategory = IngredientCategory::find($id);

      $ingredientcategory->name = $request->name;
      $ingredientcategory->status = $request->status;
      $ingredientcategory->save();
      return redirect('Ingredientcategory/list');
  }

  public function delete($id){
   IngredientCategory::find($id)->forceDelete();
   return redirect('Ingredientcategory/list');
}

}
