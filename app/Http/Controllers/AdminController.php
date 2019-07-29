<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Packages\Admin\BaseController;
use Illuminate\Support\Facades\Input;
use App\tb_user AS M_User;
use App\tb_reservation AS M_Reservation;
use App\tb_customer AS M_Customer;
use File;
use Session;
use Validator;
use Crypt;

class AdminController extends BaseController
{

	public function Dashboard()
	{
		$data['total_user'] = M_User::count();

		$data["parent"] = "dashboard";
		$data["parent_menu"] = "";
		return $this->viewAdmin("Admin.Dashboard.Dashboard",$data);
	}

	public function userView($status = "active")
	{
		$data["status"] = $status;
		$data["user"] = M_User::where('status',$status)->get();
		
		$data["parent"] = "user";
		$data["parent_menu"] = "user view";
		return $this->viewAdmin("Admin.User.User-view",$data);
	}


	public function reservasiView()
	{
		$data["reservasi"] = M_Reservation::where("status","Belum Bayar")->get();
		$data["M_customer"] = M_Customer::class;
		$data["parent"] = "reservasi";
		$data["parent_menu"] = "reservasi view";
		return $this->viewAdmin("Admin.Reservation.Reservation-view",$data);
	}

	public function reservasiTerima($id)
	{
		$table = M_Reservation::find($id);
		$table->status = "diterima";
		$affected = $table->save();
		$this->setSession($affected, "Accept Customer Tiket");
		return redirect()->route('reservasi-view');
	}

	public function userAdd()
	{
		$data["parent"] = "user";
		$data["parent_menu"] = "user add";
		return $this->viewAdmin("Admin.User.User-add",$data);
	}

	public function userSave(Request $param)
	{
		$table = new M_User;
		$table->username = $param->username;
		$table->password = Crypt::encryptString($param->password);
		$table->level = $param->level;
		$table->created_by = $this->username;
		$table->updated_by = "-";
		$table->status = "active";

		$validator = Validator::make($param->all(), [
			'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
		]);

		if ($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator->errors())->withInput();
		}
		else
		{
			$file = $param->file('photo');
			$fileName = date("Ymd").time().'.'.$file->getClientOriginalExtension();
			$file->move("images/user/", $fileName);

			$table->photo_profile = $fileName;
			$affected = $table->save();
			$this->setSession($affected, "Adding User");
			return redirect()->route('user-view');
		}
	}

	public function userEdit($id)
	{
		$data["user"] = M_User::find($id);
		$data["user"]['password'] = Crypt::decryptString($data["user"]->password);
		$data["parent"] = "user";
		$data["parent_menu"] = "user view";
		return $this->viewAdmin("Admin.User.User-edit",$data);
	}

	public function userUpdate(Request $param)
	{
		$table = M_User::find($param->id_user);
		$table->username = $param->username;
		$table->password = Crypt::encryptString($param->password); 
		$table->level = $param->level;
		$table->updated_by = $this->username;
		$table->status = "active";

		$validator = Validator::make($param->all(), [
			'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
		]);

		if ($validator->fails()) 
		{
			return redirect()->back()->withErrors($validator->errors())->withInput();
		}else{

			if ($param->hasFile("photo"))
			{
				$file = $param->file('photo');
				$fileName = date("Ymd").time().'.'.$file->getClientOriginalExtension();
				File::delete("images/user/".$table->photo_profile);
				$file->move("images/user/", $fileName);

				$table->photo_profile = $fileName;
			}
			else
			{
				$table->photo_profile = $table->photo_profile;
			}

			$affected = $table->save();
			$this->setSession($affected, "Updating User");
			return redirect()->route('user-view');
		}

	}

	public function userChangeStat()
	{
		$id = Input::get("id");
		$stat = Input::get("stat");

		$table = M_User::find($id);
		if(!is_null($table)) {
			$table->status = $stat;
			$affected = $table->save();
			$this->setSession($affected, "change status User");
			return redirect()->back();
		}
	}

	public function userViewAjax($id)
	{
		$data["user"] = M_User::find($id);
		return view("Admin.User.User-viewajax",$data);
	}

}
