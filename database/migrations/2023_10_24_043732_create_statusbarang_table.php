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
        Schema::create('statusbarang', function (Blueprint $table) {
            $table->id();
            $table->string('id_status');
            $table->string('id_barang');
            $table->string('jml_bagus');
            $table->string('jml_rusak_ringan');
            $table->string('jml_rusak_berat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statusbarang');
    }
};
