<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->integer('user_id')->nullable()->default(0);
            $table->integer('car_id')->nullable()->default(0);
            $table->date('rezdate')->nullable();
            $table->time('reztime')->nullable();
            $table->date('returndate')->nullable();
            $table->time('returntime')->nullable();
            $table->integer('days')->nullable();
            $table->double('price')->nullable();
            $table->integer('amount')->nullable();
            $table->string('ip', 20)->nullable();
            $table->string('note', 100)->nullable();
            $table->string('status', 10)->nullable()->default('False');
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
        Schema::dropIfExists('reservations');
    }
}
