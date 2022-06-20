<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'dataorder';
    public $primaryKey = 'ID_Pesanan';
    public $incrementing = true;
    public $timestamps = false;
    
    public function Paket(){
        return $this->hasOne('App\Models\Paket', 'ID_Pesanan', 'ID_Pesanan');
    }
    
     public function Pendapatan(){
        return $this->hasOne('App\Models\Pendapatan', 'ID_Pendapatan', 'ID_Pesanan');
    }
}
