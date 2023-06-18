<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;

class Mahasiswa_MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_matakuliah';

    // Relasi dengan model MataKuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id');
    }

    // Relasi dengan model Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
