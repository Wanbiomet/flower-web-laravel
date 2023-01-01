<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FlowerType;

class FlowerColor extends Model
{
    use HasFactory;
    protected $fillable = [
        'flowercolor_name',
    ];

    public function flowerTypes()
    {
        return $this->belongsToMany(FlowerType::class,'color_type','flowercolor_id','flowertype_id');
    }
}
