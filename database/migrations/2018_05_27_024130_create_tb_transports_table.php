<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transports', function (Blueprint $table) {
            $table->increments('id_transport');
            $table->string('name_transport',255);
            $table->integer('id_class_transport')->unsigned()->nullable();
            $table->integer('capacity_transport');
            $table->text('desc_transport');
            $table->string('type_transport',100);
            $table->string('status',100);
            $table->string('created_by',100);
            $table->string('updated_by',100);
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('tb_transports');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
