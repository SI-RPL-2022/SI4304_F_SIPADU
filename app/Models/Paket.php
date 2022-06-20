<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'data_paket';
    public $primaryKey = 'ID_Paket';
    public $incrementing = true;
    public $timestamps = false;
    
    public function Pengiriman(){
        return $this->hasOne('App\Models\Pengiriman', 'ID_Paket', 'ID_Paket');
    }
}
