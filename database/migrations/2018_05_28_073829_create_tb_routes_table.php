<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_routes', function (Blueprint $table) {
            $table->increments('id_route');
            $table->integer('initial_route')->unsigned()->nullable();
            $table->integer('final_route')->unsigned()->nullable();
            $table->bigInteger('price_route');
            $table->text('information_route');
            $table->string('status',100);
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
        });

        Schema::table('tb_schedules', function (Blueprint $table) {
            $table->foreign('route_id')->references("id_route")->on("tb_routes")->onDelete("set null");
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
        Schema::dropIfExists('tb_routes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
