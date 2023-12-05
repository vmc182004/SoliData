<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNitToMarquesinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marquesinas', function (Blueprint $table) {
            //
            $table->double('valor')->after('datoIndicador'); // Añade el campo NIT después de 'role'

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marquesinas', function (Blueprint $table) {
            //
        });
    }
}
