<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = ['tel'];

    public function products(){
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity') // informer le model que la table pivot contient un champs quantité
                    ->withTimestamps();  // informer le model que la table pivot contient les timestaps
    }
}
