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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            // $table->bigIncrements('transaction_detail_id');
            
            $table->unsignedBigInteger("transaction_id");
            $table->foreign("transaction_id")
                    ->references("id")
                    ->on("transaction_headers")
                    ->onDelete("cascade");
            
            $table->unsignedBigInteger("product_id");
            $table->integer('quantity');

            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
};
