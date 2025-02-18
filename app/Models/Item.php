<?php

namespace App\Models; // Mendefinisikan namespace untuk model

use Illuminate\Database\Eloquent\Factories\HasFactory;// Mengimpor trait HasFactory untuk pembuatan factory dalam pengujian
use Illuminate\Database\Eloquent\Model; // Mengimpor class Model yang akan diwarisi

class Item extends Model // Mendefinisikan class Item yang mewarisi class Model dari Eloquent
{
    use HasFactory;// Menggunakan trait HasFactory untuk mendukung pembuatan factory dalam pengujian
    protected $fillable = [// Mendefinisikan properti fillable yang berisi atribut yang boleh diisi secara massal (mass assignment)
        'name',// Mengizinkan field name untuk diisi secara massal
        'description',// Mengizinkan field description untuk diisi secara massal
    ];
}
