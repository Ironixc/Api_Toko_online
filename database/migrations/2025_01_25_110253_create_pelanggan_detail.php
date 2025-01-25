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
        Schema::create('pelanggan_detail', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("member_rank");
            $table->integer("pelanggan_id");
            $table->timestamps();

            $table->foreign("pelanggan_id")->references("id")->on("pelanggan");
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
