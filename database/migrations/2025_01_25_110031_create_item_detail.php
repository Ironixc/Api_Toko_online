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
        Schema::create('item_detail', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->string("nama_barang",100);
            $table->integer("stock");
            $table->string("imagepath");
            $table->integer("harga");
            $table->integer("item_detail_id");
            $table->timestamps();
            $table->foreign("item_detail_id")->references("id")->on("item_detail");
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
