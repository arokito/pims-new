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
        Schema::create('contributions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parishioner_id')->nullable();
            $table->string('status')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->text('amount');
            $table->bigInteger('reference');
            $table->string('tracking_id')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->string('payment_method')->nullable();



            $table->foreign('parishioner_id')->references('id')->on('parishioners')
              ->onUpdate('cascade')
              ->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('contribution_categories')
              ->onUpdate('cascade')
              ->onDelete('cascade');

              $table->foreign('payment_method_id')->references('id')->on('payment_methods')
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
        Schema::dropIfExists('contributions');
    }
};
