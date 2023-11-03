<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan1';
    protected $primaryKey = 'id';
    protected $fillable = ['id_karyawan','nama','jns_kelamin','alamat','no_hp'];
}
