<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title', 150)->default("None");
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image', 75)->nullable();
            $table->integer('category_id')->default(1);
            $table->double('price')->default(0);
            $table->integer('seats')->default(0);
            $table->integer('large_bags')->default(0);
            $table->integer('small_bags')->default(0);
            $table->text('detail')->nullable();
            $table->integer('user_id')->default(0);
            $table->string('status', 5)->default('True');
            // created_at and updated_at in timestamps()
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
        Schema::dropIfExists('cars');
    }
}
