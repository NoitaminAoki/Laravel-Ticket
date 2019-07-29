<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_classes', function (Blueprint $table) {
            $table->increments('id_class');
            $table->string('name_class',255);
            $table->bigInteger('price_ticket');
            $table->string('type_class',100);
            $table->text('desc_class');
            $table->string('status',100);
            $table->string('created_by',100);
            $table->string('updated_by',100);
            $table->timestamps();
        });

        
        Schema::table('tb_transports', function (Blueprint $table) {
            $table->foreign('id_class_transport')->references("id_class")->on("master_classes")->onDelete("set null");
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
        Schema::dropIfExists('master_classes');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
