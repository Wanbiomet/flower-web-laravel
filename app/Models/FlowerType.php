<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FlowerColor;

class FlowerType extends Model
{
    use HasFactory;
    protected $table = "flowertype";
    protected $primaryKey = 'flowertype_id';
    protected $fillable = [
        'flowertype_name',
    ];
    public function flowerColors()
    {
        return $this->belongsToMany(FlowerColor::class,'color_type','flowertype_id','flowercolor_id');
    }
    public function products(){
        return $this->hasMany(Products::class);
    }
}
