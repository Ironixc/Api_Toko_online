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
        Schema::create('pegawain_detail', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("jabatan");
            $table->integer("pegawai_id");
            $table->timestamps();

            $table->foreign("pegawai_id")->references("id")->on("pegawai");
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
