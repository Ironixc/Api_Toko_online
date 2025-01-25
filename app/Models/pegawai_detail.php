<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai_detail extends Model
{
    use HasFactory;

    protected $table = 'pegawai_detail';
    protected $fillable = [
        'pegawai_id',
        'jabatan',
    ];

    public $timestamps = true;
}
