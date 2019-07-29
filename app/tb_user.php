<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_user extends Model
{
    protected $table="tb_users";

	protected $primaryKey="id_user";
	
	protected $fillable=[
		'username','password','level','status','photo_profile','created_by','updated_by'
	];
}
