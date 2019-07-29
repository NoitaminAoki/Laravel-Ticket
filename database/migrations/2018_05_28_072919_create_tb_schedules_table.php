<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_schedules', function (Blueprint $table) {
            $table->increments('id_schedule');
            $table->integer('transport_id')->unsigned()->nullable();
            $table->foreign('transport_id')->references("id_transport")->on("tb_transports")->onDelete("set null");
            $table->integer('route_id')->unsigned()->nullable();
            $table->date('departure_date');
            $table->string('departure_time',25);
            $table->date('arrival_date');
            $table->string('arrival_time',25);
            $table->text('description_schedule');
            $table->string('type_schedule',100);
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
        Schema::dropIfExists('tb_schedules');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
