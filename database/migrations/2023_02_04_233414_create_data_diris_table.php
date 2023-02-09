<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDirisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_diris', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable(false);
            $table->string('id_daftar')->unique()->nullable(false);
            $table->string('tahunajaran');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('nisn');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_reg_akta_kelahiran');
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'buddha', 'hindu']);
            $table->enum('kebutuhan_khusus', ['ya', 'tidak']);
            $table->enum('verifikasi', [0, 1]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_diris');
    }
}
