<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color_Type extends Model
{
    use HasFactory;
    protected $table = "color_type";
    protected $fillable = [
        'flowercolor_id',
        'flowertype_id'
    ];
}
