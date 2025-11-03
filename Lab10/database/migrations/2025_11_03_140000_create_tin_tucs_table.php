<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tin_tucs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('danh_muc_id')->nullable();
            $table->string('tieude');
            $table->text('tomtat')->nullable();
            $table->longText('noidung')->nullable();
            $table->string('hinhanh')->nullable();
            $table->date('ngaydang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_tucs');
    }
};
