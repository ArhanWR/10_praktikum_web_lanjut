<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('matakuliah_id');
            $table->string('nilai')->nullable();
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('Nim')->on('mahasiswas');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->dropForeign(['mahasiswa_id']);
            $table->dropForeign(['matakuliah_id']);
        });
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
