<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Daily_Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'ingredient_id',
       'quantity',
       'unit',
       'date_time',
    ];



    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
