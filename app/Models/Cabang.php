<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;
    protected $table = 'data_cabang';
    public $primaryKey = 'ID_Cabang';
    public $incrementing = true;
    public $timestamps = false;
}
