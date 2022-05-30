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
        'waktu_kejadian',
        'tanggal_kejadian',
        'oknum'
    ];

    const STATUS = [
        '0' => 'Diterima',
        '1' => 'Sedang Diproses',
        '2' => 'Selesai',
        '99' => 'Ditolak'
    ];

    public function Petugas()
    {
        return $this->hasOne('App\Models\AssignPetugas', 'id_laporan', 'id');
    }
}
