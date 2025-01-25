<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_detail extends Model
{
    use HasFactory;

    protected $table = 'item_detail';
    protected $fillable =[
        "category_name",
    ];
    public $timestamps = true;

}
