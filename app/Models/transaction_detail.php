<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction_detail extends Model
{
    use HasFactory;

    protected $table = 'transaction detail';
    protected $fillable = [
        'id_transaction',
        'id_product',
        'quantity',
        'price',

    ];
    public $timestamps = true;
}
