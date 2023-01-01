<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Reci_name',
        'Reci_phone',
        'Reci_email',
        'Reci_address',
        'total_products',
        'total_price',
        'place_on'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }
}
