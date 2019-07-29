<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_route extends Model
{
    protected $table="tb_routes";

	protected $primaryKey="id_route";
	
	protected $fillable=[
		'initial_route','final_route','price_route','information_route','status','created_by','updated_by'
	];

	public function initialRoute()
	{
		return $this->BelongsTo('App\master_region','initial_route')->select("name_region");
	}

	public function finalRoute()
	{
		return $this->BelongsTo('App\master_region','final_route')->select("name_region");
	}
}
