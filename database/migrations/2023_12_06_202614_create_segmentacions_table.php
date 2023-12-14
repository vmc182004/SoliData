<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSegmentacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('segmentacions', function (Blueprint $table) {
            $table->id();
            $table->string('nameSegmentacion');
            $table->decimal('mayor', 15,2)->nullable();
            $table->decimal('menor', 15,2)->nullable();
            $table->unsignedBigInteger('tipo_entidad_id');
            $table->foreign('tipo_entidad_id')->references('id')->on('tipo_entidads');
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
        Schema::dropIfExists('segmentacions');
    }
}
