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
        Schema::create('transaction_detail', function (Blueprint $table) {
            $table->integer("id")->autoIncrement();
            $table->integer("transaction_id");
            $table->integer("item_detail_id");
            $table->integer("quantity");
            $table->timestamps();

            $table->foreign("transaction_id")->references("id")->on("transaction");
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
