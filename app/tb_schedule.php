<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_schedule extends Model
{
	protected $table="tb_schedules";

	protected $primaryKey="id_schedule";
	
	protected $fillable=[
		'transport_id','route_id','departure_date','departure_time','arrival_date','arrival_time','description_schedule','type_schedule','status','created_by','updated_by'
	];

}
