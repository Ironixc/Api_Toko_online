<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pelanggan_detail extends Model
{
    use HasFactory;

    protected $table = 'pelanggan_detail';
    protected $fillable = [
        "memeber_rank",
        "pelanggan_id",
    ];

    public $timestamps = true;
}
