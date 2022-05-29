<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignPetugas extends Model
{
    use HasFactory;
    protected $table = 'assign_petugas';
    public $incrementing = true;
    public $timestamps = true;
}
