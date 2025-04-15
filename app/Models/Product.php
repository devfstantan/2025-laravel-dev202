<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'stock',
        'is_published',
        'date_expiration',
        'category_id'
    ];
    
    // Définir la relation product avec category:
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
