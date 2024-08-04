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
        Schema::create('kelola_data_items', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->text('nama');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rt');
            $table->text('agama');
            $table->string('status');
            $table->string('kewarganegaraan');
            $table->string('pendidikan');
            $table->string('updated_at');
            $table->string('created_at');
            $table->string('pekerjaan');
            $table->text('pendapatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelola_data_items');
    }
};
