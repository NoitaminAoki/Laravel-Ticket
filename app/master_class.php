<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_class extends Model
{
    protected $table="master_classes";

	protected $primaryKey="id_class";
	
	protected $fillable=[
		'name_class','price_ticket','type_class','desc_class','status','created_by','updated_by'
	];
}
