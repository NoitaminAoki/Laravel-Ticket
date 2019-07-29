<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Packages\Admin\BaseController;
use Illuminate\Support\Facades\Input;
use App\tb_transport AS M_Transport;
use App\tb_schedule AS M_Schedule;
use App\master_class AS M_Class;
use App\master_region AS M_Region;
use App\tb_route AS M_Route;
use App\tb_customer AS M_Customer;
use App\tb_reservation AS M_Reservation;
use Session;
use Validator;
use Crypt;
use DB;

class CustomerController extends BaseController
{
	public function customerRegister()
	{
		return view("Customer.Customer-register");
		$error = null;
		$error->error = "asdsad";
	}

	public function customerLogin()
	{
		return view("Login.Login-customer");
	}

	public function customerRegisterSave(Request $param)
	{
		$table = new M_Customer;
		$table->name_customer = $param->username;
		$table->pass_customer = Crypt::encryptString($param->password);
		$table->contact_customer = $param->contact;
		$table->mail_customer = $param->email;
		$table->created_by = "-";
		$table->updated_by = "-";
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Register");
		return redirect("/");
	}

	public function customerReservasi($id)
	{
		$data['schedule'] = M_Schedule::find($id);
		$data['reservasi'] = M_Reservation::where("schedule_id",$data['schedule']->id_schedule)->count();
		$data['transport'] = M_Transport::find($data['schedule']->transport_id);
		$data['route'] = M_Route::find($data['schedule']->route_id);
		return view("Home.Home-reservasi",$data);
	}

	public function customerReservasiSave(Request $param)
	{
		$code1 = ["A","B","C","D","F","G"];

		for ($i=1; $i <= $param->tiket ; $i++) {
			$table = new M_Reservation;
			$table->customer_id = $param->id_customer;
			$table->schedule_id = $param->id_schedule;
			$table->code_reservation = array_random($code1).array_random($code1).rand("1","9").rand("1","9").rand("1","9").array_random($code1).array_random($code1).array_random($code1).rand("1","9");
			$table->accepted_by = "-";
			$table->status = "Belum Bayar";
			$table->save();
		}

		return redirect("/");
	}
}
