<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPaket extends Model
{
    use HasFactory;
    protected $table = 'data_status_paket';
    public $primaryKey = 'ID_Status';
    public $incrementing = true;
    public $timestamps = false;
    
    public function Order(){
        return $this->hasOne('App\Models\Order', 'ID_Pesanan', 'ID_Pesanan');
    }
}
