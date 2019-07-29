<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_customer extends Model
{
    protected $table="tb_customers";

	protected $primaryKey="id_customer";
	
	protected $fillable=[
		'name_customer','pass_customer','contact_customer','mail_customer','status','created_by','updated_by'
	];
}
