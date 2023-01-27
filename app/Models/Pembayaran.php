<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

        public function siswa(){
            return $this->hasMany(Siswa::class,'nisn','nisn');
        }
        public function petugas(){
            return $this->belongsTo(User::class,'id_petugas', 'id');
        }
}
