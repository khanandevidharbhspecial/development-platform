<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('Admin.Category.Add');
    }

    public function store(Request $request){
    
        $result=Category::create($request->all());

        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $category=Category::orderBy('id','DESC')->paginate($limit);
        return view('Admin.Category.List',data:[
            'categories'=> $category,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }

    public function list(Request $request){
        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $category=Category::orderBy('id','DESC')->paginate($limit);
        return view('Admin.Category.List',data:[
            'categories'=> $category,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }
    public function delete($id){
        Category::find($id)->forceDelete();
        return redirect('Category/list');
    }

    public function update($id){
        $category = Category::find($id);
        return view('Admin.Category.update',compact('category'));
     }
     public function change( Request $request){    
        $id = $request->id;
      $category = Category::find($id);

        $category->name = $request->name;
        $category->status = $request->status;
        $category->save();
        return redirect('Category/list');
    }
}
