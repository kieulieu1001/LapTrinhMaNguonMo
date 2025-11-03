<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinh_anh_tin_tuc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tin_id');
            $table->string('duongdan');
            $table->string('ghi_chu')->nullable();
            $table->timestamps();
            $table->foreign('tin_id')->references('id')->on('tin_tucs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinh_anh_tin_tuc');
    }
};
