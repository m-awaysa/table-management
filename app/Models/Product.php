<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'company',
        'discount',
        'description',
        'visibility',
        'amount',
        'category_id',
        'click',
        'image',
        'color',
        'product_code',
        'purchased_price'



    ];

    public function category (){
        return $this->belongsTo(Category::class);
    }

 

}
