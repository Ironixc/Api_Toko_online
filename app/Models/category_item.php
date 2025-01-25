<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_item extends Model
{
    use HasFactory;
    protected $table = 'category_item';
    protected $fillable =[
        "nama_barang",
        "stock",
        "imagepath",
        "harga",
        "item_detail_id",
    ];
    public $timestamps = true;

}
