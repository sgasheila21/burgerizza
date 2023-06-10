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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")
                    ->references("id")
                    ->on("categories")
                    ->onDelete("cascade");

            $table->string('attribute_name');
            $table->integer('attribute_order');
            $table->longText('attribute_description')->nullable();
            $table->string('attribute_status'); // active or inactive

            $table->boolean('multiple_choice'); // true or false

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
        Schema::dropIfExists('attributes');
    }
};
