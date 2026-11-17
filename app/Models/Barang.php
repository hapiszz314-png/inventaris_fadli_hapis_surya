<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    // Menentukan kolom yang boleh diisi secara massal
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'kondisi',
        'jumlah',
        'lokasi',
        'tanggal_masuk'
    ];
}