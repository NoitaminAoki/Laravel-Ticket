<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Packages\Admin\BaseController;
use App\tb_transport AS M_Transport;
use App\tb_schedule AS M_Schedule;
use App\master_class AS M_Class;
use App\master_region AS M_Region;
use App\tb_route AS M_Route;
use Session;
use Validator;
use Crypt;
use DB;

class HomeController extends BaseController
{
    public function home()
    {
		$data["schedule"] = M_Schedule::all();

		$data["M_transport"] = M_Transport::class;
		$data["M_route"] = M_Route::class;

    	return view("Home.Home-view",$data);
    }
}
