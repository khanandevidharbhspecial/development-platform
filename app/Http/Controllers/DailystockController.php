<?php

namespace App\Http\Controllers;

use App\Models\Daily_Stock;
use Illuminate\Http\Request;
use App\Models\Ingredient;


class DailystockController extends Controller
{
    public function add(){
        $ingredients = Ingredient::get();
        return view('Admin.Daily_Stock.Add',compact('ingredients'));
    }
    public function store(Request $request){
        $request->date = now()->format('Y-m-d');
        $result=Daily_Stock::create($request->all());


        $ingredientInfo = Ingredient::where('id',  $request->ingredient_id)->first();
          
        $totalStock=$this->getTotalStockValue($ingredientInfo,$result, '+');

        Ingredient::where('id',  $request->ingredient_id)->update(['initial_stock' =>  $totalStock]);


        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $dailystock=Daily_Stock::orderBy('id','DESC')->paginate($limit);
        return view('Admin.Daily_Stock.List',data:[
            'dailystocks'=> $dailystock,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }
       
    private function getTotalStockValue($ingredientInfo,$result, $operator){
        $quantity = 0;
        if($result['unit']==$ingredientInfo['unit']){
            $quantity = $result['quantity'];
        }else if(($ingredientInfo['unit']=='kg' && $result['unit']=='gm') || ($ingredientInfo['unit']=='ltr' && $result['unit']=='ml')){
            $quantity = $result['quantity'] / 1000;
           
        }
        if ($operator == '+') {
            $totalStock = $ingredientInfo['initial_stock'] + $quantity;
        } elseif ($operator == '-') {
            $totalStock = $ingredientInfo['initial_stock'] - $quantity;
        }
        return  $totalStock;
    }

    public function list(Request $request){
        $limit = $request['per_page'] ? $request['per_page'] : 10;
        $dailystocks=Daily_Stock::orderBy('id','DESC')->paginate($limit);
        return view('Admin.Daily_Stock.List',data:[
            'dailystocks'=> $dailystocks,
            'perPageOptions' => [10, 20, 50, 100],
        ]);
    }
    public function delete($id){
        $dailystock=Daily_Stock::find($id);
        $ingredientInfo=Ingredient::find($dailystock->ingredient_id);
        $totalStock=$this->getTotalStockValue($ingredientInfo,$dailystock,'-');
        $ingredientInfo->update(['initial_stock' => $totalStock]);
        $dailystock->forceDelete();
        return  redirect('Daily_stock/list');

    }
}
