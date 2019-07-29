<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_region extends Model
{
    protected $table="master_regions";

	protected $primaryKey="id_region";
	
	protected $fillable=[
		'name_region','information_region','status','created_by','updated_by'
	];}
