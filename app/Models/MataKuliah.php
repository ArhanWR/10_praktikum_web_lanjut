<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa_MataKuliah;
use App\Models\Mahasiswa;

class MataKuliah extends Model
{
    use HasFactory;
    protected $table = 'matakuliah';

    // Relasi dengan model Mahasiswa_MataKuliah
    public function mahasiswaMataKuliah()
    {
        return $this->hasMany(Mahasiswa_MataKuliah::class);
    }

    // Relasi many-to-many dengan model Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matakuliah', 'mahasiswa_id', 'matakuliah_id')
            ->withPivot('nilai');
    }
}
