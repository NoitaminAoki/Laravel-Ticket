<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use App\tb_user AS M_User;
use Session;

class TransOffAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has("login_admin") && !empty(Session::get("login_admin.id"))) {

            $id = Session::get("login_admin.id");
            $level = Session::get("login_admin.level");

            $data = M_User::where(['id_user' => $id, 'status' => 'active'])->get()->first();
            $getCount = M_User::where(['id_user' => $id, 'status' => 'active'])->count();
            if($getCount == 0 || $level != "Transport Officer") {
                return response(view("Template.Template-error"));    
            }else {
                Session::put("login_admin.username",$data->username);
                Session::put("login_admin.photo",$data->photo_profile);
            }
        }
        else {
            return response(view("Template.Template-error"));
        }

        return $next($request);
    }
}
