<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;
    protected $table = "payments";
    protected $fillable = [
        'p_transaction_id',
        'user_id',
        'amount',
        'p_vnp_response_code',
        'code_bank'
    ];
}
