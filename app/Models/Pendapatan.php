<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    use HasFactory;
    protected $table = 'data_pendapatan';
    public $primaryKey = 'ID_Pendapatan';
    public $incrementing = true;
    public $timestamps = false;
}
