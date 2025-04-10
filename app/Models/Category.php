<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    // Définir la relation avec produit
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function latestProduct(){
        return $this->hasOne(Product::class)->latestOfMany("created_at");
    }

    public function cheapestProduct(){
        return $this->hasOne(Product::class)
                // ->oldestOfMany("price");
                ->ofMany('price','min');
    }
}
