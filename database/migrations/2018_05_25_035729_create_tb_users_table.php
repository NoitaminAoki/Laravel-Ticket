<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('username',255);
            $table->string('password',255);
            $table->string('level',100);
            $table->text('photo_profile');
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
        Schema::dropIfExists('tb_users');
    }
}
