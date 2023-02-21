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
            $table->integer('id_user_daftar')->unique()->nullable(false);
            $table->string('nama')->nullable(true);
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable(true);
            $table->string('nisn')->nullable(true);
            $table->string('nik')->nullable(true);
            $table->string('tempat_lahir')->nullable(true);
            $table->date('tanggal_lahir')->nullable(true);
            $table->string('no_reg_akta_kelahiran')->nullable(true);
            $table->string('alamat')->nullable(true);
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'buddha', 'hindu'])->nullable(true);
            $table->enum('kebutuhan_khusus', ['ya', 'tidak'])->nullable(true);
            $table->enum('tinggal_bersama_ortu', ['ya', 'tidak'])->nullable(true);
            $table->enum('verifikasi', [0, 1])->nullable(true);
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
