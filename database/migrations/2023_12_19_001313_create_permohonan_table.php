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
        Schema::create('permohonan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->text('sk_berkala');
            $table->text('sk_pangkat');
            $table->text('skp');
            $table->text('pengantar_kepsek');
            $table->string('tahap')->default('1');
            $table->string('status')->default('0');
            $table->string('selesai')->default('0');
            $table->string('komentar')->nullable();
            $table->text('sk')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonan');
    }
};
