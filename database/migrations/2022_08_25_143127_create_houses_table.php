<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name', 100)->unique();
            $table->unsignedTinyInteger('number_rooms');
            $table->unsignedTinyInteger('number_beds');
            $table->unsignedTinyInteger('number_bathrooms');
            $table->unsignedSmallInteger('square_meters');
            $table->string('address', 100);
            $table->string('image', 200);
            $table->text('description')->nullable();
            $table->float('price', 6, 2)->nullable()->unsigned();
            $table->boolean('is_visible')->default(false);
            $table->float('latitude', 8, 6);
            $table->float('longitude', 9, 6);
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
        Schema::dropIfExists('houses');
    }
}
