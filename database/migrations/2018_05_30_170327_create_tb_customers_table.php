<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_customers', function (Blueprint $table) {
            $table->increments('id_customer');
            $table->string('name_customer',255);
            $table->string('pass_customer',255);
            $table->string('contact_customer',25);
            $table->string('mail_customer',255);
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
        Schema::dropIfExists('tb_customers');
    }
}
