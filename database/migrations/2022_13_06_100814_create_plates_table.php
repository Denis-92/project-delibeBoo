<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 4, 2);
            $table->boolean('hidden');
            $table->string('image')->nullable();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('resturant_id')->nullable();
            $table->foreign('resturant_id')->references('id')->on('resturants');
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
        Schema::dropIfExists('plates');
    }
}
