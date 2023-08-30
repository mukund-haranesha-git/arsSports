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
        //'category','name','qar_price','uae_price','inr_price','description','status'
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category');
            $table->string('name');
            $table->string('qar_price')->nullable();
            $table->string('uae_price')->nullable();
            $table->string('inr_price')->nullable();
            $table->longText('description')->nullable();
            $table->text('image')->nullable();
            $table->string('status')->default('active');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
