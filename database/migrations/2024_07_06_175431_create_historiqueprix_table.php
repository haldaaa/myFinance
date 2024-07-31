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
        Schema::create('historiqueprix', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_id');
            $table->decimal('prix', 8, 3);
            $table->timestamps();
           // A sup ??  $table->integer('tour');
            $table->unsignedBigInteger('compteur'); 
            $table->foreign('action_id')->references('id')->on('actions')->onDelete('cascade');
            $table->foreign('compteur')->references('id')->on('compteurs')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historiqueprix');
    }
};
