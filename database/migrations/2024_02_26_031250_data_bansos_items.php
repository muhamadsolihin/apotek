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
        Schema::create('data_bansos_items', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->text('nama_kk');
            $table->string('jenis_kelamin');
            $table->string('umur');
            $table->string('alamat');
            $table->string('desa');
            $table->text('rt');
            $table->string('rw');
            $table->string('jumlah_tanggungan');
            $table->string('updated_at');
            $table->string('created_at');
            $table->string('pekerjaan');
            $table->text('pendapatan');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_bansos_items');
    }
};
