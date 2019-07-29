<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_reservations', function (Blueprint $table) {
            $table->increments('id_reservation');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references("id_customer")->on("tb_customers")->onDelete("set null");
            $table->integer('schedule_id')->unsigned()->nullable();
            $table->foreign('schedule_id')->references("id_schedule")->on("tb_schedules")->onDelete("set null");
            $table->string('code_reservation',255);
            $table->string('status',100);
            $table->string('accepted_by',100);
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
        Schema::dropIfExists('tb_reservations');
    }
}
