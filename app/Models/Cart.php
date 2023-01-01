<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";
    protected $fillable = [
        'user_id',
        'product_id',
        'cart_qty',
    ];
    public function products(){
        return $this->belongsTo(Products::class,'product_id','product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
