<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $table = 'orderitems';
    use HasFactory;
    protected $fillable = [
        'order_id', 'product_id', 'total_qty', 'total_price'
    ];
    public function products()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
