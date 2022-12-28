<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'visibility',
        'name',
        'image',
        'description'

    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
     public function feature()
     {
         return $this->hasMany(Feature::class);
     }
   
}
