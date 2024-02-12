<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{

    protected $table = 'pasien';
    use HasFactory;

    protected $fillable = [
        "nama",
        "tgl_lahir",
        "gender",
        "berat_badan",
        "tinggi_badan",
        "penyakit_khusus",
        'username',
        'email',
        'password',
    ];
}
