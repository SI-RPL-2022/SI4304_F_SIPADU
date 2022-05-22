<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id_user',
        'no_referensi',
        'fasilitas',
        'lokasi',
        'keluhan',
        'file',
        'tipe',
        'status',
        'alasan_penolakan',
    ];

    const STATUS = [
        '0' => 'Menunggu Tanggapan',
        '1' => 'Diterima',
        '99' => 'Ditolak'
    ];
}
