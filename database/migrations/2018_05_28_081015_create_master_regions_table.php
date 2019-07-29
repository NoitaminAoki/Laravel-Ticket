<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_regions', function (Blueprint $table) {
            $table->increments('id_region');
            $table->string('name_region',100);
            $table->text('information_region');
            $table->string('status',100);
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
        });

        Schema::table('tb_routes', function (Blueprint $table) {
            $table->foreign('initial_route')->references("id_region")->on("master_regions")->onDelete("set null");
            $table->foreign('final_route')->references("id_region")->on("master_regions")->onDelete("set null");
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
        Schema::dropIfExists('master_regions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
