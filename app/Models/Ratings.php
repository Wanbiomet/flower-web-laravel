<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $table = "ratings";
    protected $fillable = [
        'user_id',
        'product_id',
        'ratings',
    ];
    public function products(){
        return $this->belongsTo(Products::class,'product_id','product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id','user_id');
    }
}
