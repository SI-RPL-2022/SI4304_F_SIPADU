<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'data_pengiriman';
    public $primaryKey = 'ID_Pengiriman';
    public $incrementing = true;
    public $timestamps = false;
    
    public function StatusPaket(){
        return $this->hasOne('App\Models\StatusPaket', 'ID_Pengiriman', 'ID_Pengiriman');
    }
}


