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
        Schema::connection('mysql-320a61c5-webhost036-e2fc.a.aivencloud.com')->create('akun', function (Blueprint $table) {
            $table->string('kode_akun', 50);
            $table->string('nama_akun', 255);
            $table->text('deskripsi')->nullable();
            $table->string('tipe_akun', 50)->nullable();
            $table->string('kategori_akun', 50)->nullable();
            $table->integer('level_akun')->nullable();
            $table->timestamp('created_at')->default(now());
            $table->unique(array('kode_akun'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('mysql-320a61c5-webhost036-e2fc.a.aivencloud.com')->dropIfExists('akun');
    }
};
