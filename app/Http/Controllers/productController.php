<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function add(){
        $categories = Category::get();
        return view('Admin.Product.Add',compact('categories'));
    }

    public function store(Request $request){
    
        $result=Product::create($request->all());

        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $product=Product::orderBy('id','DESC')->paginate($limit);
        return view('Admin.Product.List',data:[
            'products'=> $product,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }

    public function list(Request $request){
        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $product= Product::with(['category'])->orderBy('id','DESC')->paginate($limit);
        return view('Admin.Product.List',data:[
            'products'=> $product,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }

}
