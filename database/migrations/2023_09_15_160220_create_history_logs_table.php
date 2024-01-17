<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('history_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('action');
            $table->timestamp('timestamp');
            // Add any other fields as needed
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('history_logs');
    }
};
