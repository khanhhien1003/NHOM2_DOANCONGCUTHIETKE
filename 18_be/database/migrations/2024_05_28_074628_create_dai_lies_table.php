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
        Schema::create('dai_lys', function (Blueprint $table) {
            $table->id();
            $table->string('ho_va_ten');
            $table->string('email');
            $table->string('so_dien_thoai');
            $table->date('ngay_sinh');
            $table->string('password');
            $table->string('ten_doanh_nghiep');
            $table->string('ma_so_thue');
            $table->string('dia_chi_kinh_doanh');
            $table->integer('is_vip')->default(0);
            $table->integer('is_active')->default(0);
            $table->integer('is_block')->default(0);
            $table->string('hash_active')->nullable();
            $table->string('hash_reset')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dai_lys');
    }
};
