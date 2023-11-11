<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Occasion;
use App\Models\FlowerType;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'occasion_id',
        'flowertype_id',
        'product_desc',
        'product_price',
        'product_design',
        'product_status',
    ];
    public function occasions()
    {
        return $this->belongsTo(Occasion::class, 'occasion_id')->withDefault();
    }
    public function flowertypes()
    {
        return $this->belongsTo(FlowerType::class, 'flowertype_id')->withDefault();
    }
    public function users(){
        return $this->belongsToMany(User::class,'carts','user_id','product_id');
    }
}
