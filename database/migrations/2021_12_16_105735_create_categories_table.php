<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // run 'php artisan make:migration Category' before 'php artisan migrate' to change fields and the table
        Schema::create('categories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('parent_id')->default(0);
            $table->string('title', 150);
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('image', 100)->nullable();
            $table->string('status', 5)->nullable()->default('False');
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
        Schema::dropIfExists('categories');
    }
}
