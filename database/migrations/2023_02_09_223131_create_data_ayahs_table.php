<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAyahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ayahs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user_daftar')->unique()->nullable(false);
            $table->string('nama')->nullable(true);
            $table->string('kontak')->nullable(true);
            $table->string('nik')->nullable(true);
            $table->string('pendidikan')->nullable(true);
            $table->string('pekerjaan')->nullable(true);
            $table->string('penghasilan')->nullable(true);
            $table->string('alamat')->nullable(true);
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
        Schema::dropIfExists('data_ayahs');
    }
}
