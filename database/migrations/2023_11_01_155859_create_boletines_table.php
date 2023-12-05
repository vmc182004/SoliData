<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletines', function (Blueprint $table) {
            $table->id();
            $table->string('titulo_boletin');
            $table->text('texto_boletin');
            $table->text('nombreBoton_boletin');
            $table->text('año_boletin');
            $table->string('image_boletin');
            $table->string('icono_boletin');
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
        Schema::dropIfExists('boletines');
    }
}
