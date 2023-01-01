<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Occasion extends Model
{
    use HasFactory;
    protected $table = "occasions";
    protected $fillable = [
        'occasion_name',
    ];
    public function products(){
        return $this->hasMany(Products::class);
    }
}
