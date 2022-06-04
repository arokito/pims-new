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
        Schema::create('parishioners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->bigInteger('pay_number');
            $table->string('ubatizo_place')->nullable();
            $table->date('ubatizo_date')->nullable();
            $table->string('komunio_place')->nullable();
            $table->date('komunio_date')->nullable();
            $table->boolean('ndoa')->default(0)->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->string('gender');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->unsignedBigInteger('family_id')->nullable();
            $table->foreign('family_id')->references('id')->on('families')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            




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
        Schema::dropIfExists('parishioners');
    }
};
