<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_reservation extends Model
{
    protected $table="tb_reservations";

	protected $primaryKey="id_reservation";
	
	protected $fillable=[
		'customer_id','schedule_id','code_reservation','status','accepted_by'
	];
}
