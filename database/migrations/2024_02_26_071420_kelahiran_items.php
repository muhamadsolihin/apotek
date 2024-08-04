<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelahiran_items', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->text('tempat_lahir_pengaju')->nullable();
            $table->string('tanggal_lahir_pengaju')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('alamat_lengkap')->nullable();
            $table->text('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pekerjaan_pengaju')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->timestamps();
            $table->string('nama_ibu')->nullable();
            $table->string('type')->nullable();
            $table->text('anak_ke')->nullable();
            $table->string('nik_pengaju')->nullable();
            $table->string('orgtua_pengaju')->nullable();
            $table->string('status')->nullable();
            $table->string('nama_instansi')->nullable();
            $table->string('kepentingan')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('tempat_wafat')->nullable();
            $table->string('tanggal_wafat')->nullable();
            $table->string('alasan_wafat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelahiran_items');
    }
};




