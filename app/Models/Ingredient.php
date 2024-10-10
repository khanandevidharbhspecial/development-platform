<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ingredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingredientcategory_id',
        'name',
       'unit',
       'initial_stock',
    ];

    public function dailyStocks(): HasMany
    {
        return $this->hasMany(Daily_Stock::class);
    }
    public function ingredientcategory(): HasOne
    {
          return $this->hasOne(IngredientCategory::class,'id','ingredientcategory_id');
    
    }
}
