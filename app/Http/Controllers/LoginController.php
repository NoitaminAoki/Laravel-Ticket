<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_user AS M_User;
use App\tb_customer AS M_Customer;
use Session;
use Crypt;

class LoginController extends Controller
{
	public function adminLogin()
	{
		return view('Login.Login-admin');
	}

	public function adminSetLogin(Request $param)
	{
		$username = $param->username;
		$password = $param->password;
		$error = array(
			'error' => "username or password is wrong!"
		);

		$data = M_User::where(['username'=> $username, 'status' => 'active'])->first();

		if(!empty($data)) {
			if (Crypt::decryptString($data["password"]) == $password) {
				$admin_Data = [
					'id' => $data["id_user"],
					'username' => $data["username"],
					'photo' => $data["photo_profile"],
					'level' => $data["level"]
				];
				Session::put('login_admin', $admin_Data);
				return redirect()->route("admin-dash");
			}
			else {
				return redirect()->back()->withErrors($error)->withInput();
			}
		}
		else {
			return redirect()->back()->withErrors($error)->withInput();
		}
	}

	public function customerSetLogin(Request $param)
	{
		$username = $param->username;
		$password = $param->password;
		$error = array(
			'error' => "username or password is wrong!"
		);

		$data = M_Customer::where(['name_customer'=> $username, 'status' => 'active'])->first();

		if(!empty($data)) {
			if (Crypt::decryptString($data["pass_customer"]) == $password) {
				$customer_Data = [
					'id' => $data["id_customer"],
					'username' => $data["name_customer"]
				];
				Session::put('login_customer', $customer_Data);
				return redirect("/");
			}
			else {
				return redirect()->back()->withErrors($error)->withInput();
			}
		}
		else {
			return redirect()->back()->withErrors($error)->withInput();
		}
	}

	public function adminLogout()
	{
		Session::flush();
		return redirect()->route("admin-login");
	}
}
