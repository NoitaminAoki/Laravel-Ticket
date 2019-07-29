<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_transport extends Model
{
    protected $table="tb_transports";

	protected $primaryKey="id_transport";
	
	protected $fillable=[
		'name_transport','class_transport','capacity_transport','desc_transport','type_transport','status','created_by','updated_by'
	];

	public function class()
	{
		return $this->BelongsTo('App\master_class','id_class_transport')->select(array('name_class','price_ticket','desc_class'));
	}
}
