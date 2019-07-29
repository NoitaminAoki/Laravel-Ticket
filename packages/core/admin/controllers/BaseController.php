<?php

namespace Packages\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class BaseController extends Controller
{

    protected $level;

    public $username;

    function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->level = Session::get("login_admin.level");
            $this->username = Session::get("login_admin.username");

            return $next($request);
        });
    }

    public function viewAdmin($view, $data)
    {
    	$data['menu'] = "";
        if ($this->level == "Super Admin") {
            $data['menu'] = "Menu.Menu-sa";
        }
        elseif ($this->level == "Transport Officer") {
            $data['menu'] = "Menu.Menu-transport";
        }
    	elseif ($this->level == "Scheduling Officer") {
    		$data['menu'] = "Menu.Menu-scheduling";
    	}

    	return view($view, $data);
    }

    public function setSession($affected_row, $message)
    {
    	if ($affected_row > 0) {
            Session::flash('messages','<div id="notification" data-type="success" data-message="Success '.$message.'!"></div>');
        }
        else{
            Session::flash('messages','<div id="notification" data-type="danger" data-message="Failed '.$message.'!"></div>');
        }
    }

}
