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
use Session;
use Validator;
use Crypt;
use DB;

class OfficeController extends BaseController
{

	public function transportView($type,$status = "active")
	{
		$data["type"] = $type;
		$data["status"] = $status;
		$data["transport"] = M_Transport::where(['type_transport' => $type,'status' => $status])->get();
		
		$data["parent"] = $type;
		$data["parent_menu"] = $type." view";
		return $this->viewAdmin("Admin.Transport.Transport-view",$data);
	}

	public function transportAdd($type)
	{
		$data["data_class"] = M_Class::where(['type_class' => $type,'status' => 'active'])->get();

		$data["type"] = $type;
		$data["parent"] = $type;
		$data["parent_menu"] = $type." add";
		return $this->viewAdmin("Admin.Transport.Transport-add",$data);
	}

	public function transportSave(Request $param, $type)
	{
		$table = new M_Transport;
		$table->name_transport = $param->name;
		$table->id_class_transport = $param->class;
		$table->capacity_transport = $param->capacity;
		$table->desc_transport = $param->description;
		$table->type_transport = $type;
		$table->created_by = $this->username;
		$table->updated_by = "-";
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Adding ".$type);
		return redirect()->route('transport-view',[$type]);
	}

	public function transportEdit($type,$id)
	{
		$data["transport"] = M_Transport::find($id);
		$data["data_class"] = M_Class::where(['type_class' => $type,'status' => 'active'])->get();

		$data["type"] = $type;
		$data["parent"] = $type;
		$data["parent_menu"] = $type." view";
		return $this->viewAdmin("Admin.Transport.Transport-edit",$data);

	}

	public function transportUpdate(Request $param,$type)
	{
		$table = M_Transport::find($param->id_transport);
		$table->name_transport = $param->name;
		$table->id_class_transport = $param->class;
		$table->capacity_transport = $param->capacity;
		$table->desc_transport = $param->description;
		$table->updated_by = $this->username;
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Updating ".$type);
		return redirect()->route('transport-view',[$type]);
	}

	public function transportChangeStat($type)
	{
		$id = Input::get("id");
		$stat = Input::get("stat");

		$table = M_Transport::find($id);
		if(!is_null($table)) {
			$table->status = $stat;
			$affected = $table->save();
			$this->setSession($affected, "change status ".$type);
			return redirect()->back();
		}
	}

	public function classView($status = "active")
	{
		$data["status"] = $status;
		$data["class"] = M_Class::where('status',$status)->get();
		
		$data["parent"] = "master";
		$data["parent_menu"] = "master class";
		return $this->viewAdmin("Admin.Master.Master-class",$data);
	}

	public function classSave(Request $param)
	{
		$table = new M_Class;
		$table->name_class = $param->name;
		$table->price_ticket = $param->price;
		$table->type_class = $param->type;
		$table->desc_class = $param->desc;
		$table->created_by = $this->username;
		$table->updated_by = "-";
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Adding Class");
		return redirect()->route('class-view');
	}

	public function classEdit($id)
	{
		$data["class"] = M_Class::find($id);

		return view("Admin.Master.Master-class-ajax",$data);
	}

	public function classUpdate(Request $param)
	{
		$table = M_Class::find($param->id_class);
		$table->name_class = $param->name;
		$table->price_ticket = $param->price;
		$table->type_class = $param->type;
		$table->desc_class = $param->desc;
		$table->updated_by = $this->username;
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Updating Class");
		return redirect()->route('class-view');
	}

	public function classChangeStat()
	{
		$id = Input::get("id");
		$stat = Input::get("stat");

		$table = M_Class::find($id);
		if(!is_null($table)) {
			$table->status = $stat;
			$affected = $table->save();
			$this->setSession($affected, "change status class");
			return redirect()->back();
		}
	}

	public function regionView()
	{
		$data["region"] = M_Region::all();
		
		$data["parent"] = "master";
		$data["parent_menu"] = "master region";
		return $this->viewAdmin("Admin.Master.Master-region",$data);
	}

	public function regionSave(Request $param)
	{
		$table = new M_Region;
		$table->name_region = $param->name;
		$table->information_region = $param->desc;
		$table->created_by = $this->username;
		$table->updated_by = "-";
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Adding Region");
		return redirect()->route('region-view');
	}

	public function regionEdit($id)
	{
		$data["region"] = M_Region::find($id);

		return view("Admin.Master.Master-region-ajax",$data);
	}

	public function regionUpdate(Request $param)
	{
		$table = M_Region::find($param->id_region);
		$table->name_region = $param->name;
		$table->information_region = $param->desc;
		$table->updated_by = $this->username;
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Updating Region");
		return redirect()->route('region-view');
	}

	public function routeView()
	{
		$data["route"] = M_Route::all();
		$data["region"] = M_Region::select("id_region","name_region")->get();

		$data["parent"] = "route";
		$data["parent_menu"] = "route view";
		return $this->viewAdmin("Admin.Route.Route-view",$data);
	}

	public function routeSave(Request $param)
	{
		$table = new M_Route;
		$table->initial_route = $param->initial;
		$table->final_route = $param->final;
		$table->price_route = $param->price;
		$table->information_route = $param->information;
		$table->created_by = $this->username;
		$table->updated_by = "-";
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Adding Route");
		return redirect()->route('route-view');
	}

	public function routeEdit($id)
	{
		$data["route"] = M_Route::find($id);
		$data["region"] = M_Region::select("id_region","name_region")->get();

		return view("Admin.Route.Route-edit-ajax",$data);
	}

	public function routeUpdate(Request $param)
	{
		$table = M_Route::find($param->id_route);
		$table->initial_route = $param->initial;
		$table->final_route = $param->final;
		$table->price_route = $param->price;
		$table->information_route = $param->information;
		$table->updated_by = $this->username;
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Updating Route");
		return redirect()->route('route-view');
	}

	public function scheduleView($type)
	{
		$data["type"] = $type;
		$data["schedule"] = M_Schedule::where("tb_schedules.type_schedule",$type)->get();

		$data["M_transport"] = M_Transport::class;
		$data["M_route"] = M_Route::class;
		
		$data["parent"] = "schedule ".$type;
		$data["parent_menu"] = "schedule ".$type." view";
		return $this->viewAdmin("Admin.Schedule.Schedule-view",$data);
	}

	public function scheduleDetail($type,$id)
	{
		$data["schedule"] = M_Schedule::find($id);
		$data["type"] = $type;
		$data["data_transport"] = M_Transport::find($data["schedule"]->transport_id);

		$data["data_route"] = M_Route::find($data["schedule"]->route_id);

		$data["type"] = $type;
		$data["parent"] = "schedule ".$type;
		$data["parent_menu"] = "schedule ".$type." view";
		return $this->viewAdmin("Admin.Schedule.Schedule-detail",$data);
	}

	public function scheduleCalendar($type)
	{
		$data["schedule"] = M_Schedule::select(DB::raw("concat(name_transport,' - ',name_class) as title"),DB::raw("concat(departure_date,' ',departure_time) as start"),DB::raw("concat(arrival_date,' ',arrival_time) as end"),DB::raw("concat('#1ABC9C') as backgroundColor"),DB::raw('concat("'.route("schedule-detail",[$type]).'/",id_schedule) as url'))->leftJoin("tb_transports","tb_schedules.transport_id","=","tb_transports.id_transport")->leftJoin("master_classes","tb_transports.id_class_transport","=","master_classes.id_class")->where("tb_schedules.type_schedule",$type)->get();

		// dd($data["schedule"]);
		$data["type"] = $type;
		$data["parent"] = "schedule ".$type;
		$data["parent_menu"] = "schedule ".$type." calendar";
		return $this->viewAdmin("Admin.Schedule.Schedule-calendar",$data);
	}

	public function scheduleAdd($type)
	{
		$data["data_transport"] = M_Transport::where(['type_transport' => $type,'status' => 'active'])->get();

		$data["data_route"] = M_Route::where(['status' => 'active'])->get();

		$data["type"] = $type;
		$data["parent"] = "schedule ".$type;
		$data["parent_menu"] = "schedule ".$type." add";
		return $this->viewAdmin("Admin.Schedule.Schedule-add",$data);
	}

	public function scheduleSave(Request $param,$type)
	{
		$date = explode(" - ", $param->date);
		$param['d_date'] = date("Y-m-d", strtotime($date[0]));
		$param['a_date'] = date("Y-m-d", strtotime($date[1]));

		$table = new M_Schedule;
		$table->transport_id = $param->transport;
		$table->route_id = $param->route;
		$table->departure_date = $param->d_date;
		$table->departure_time = $param->d_time;
		$table->arrival_date = $param->a_date;
		$table->arrival_time = $param->a_time;
		$table->description_schedule = $param->description;
		$table->type_schedule = $type;
		$table->created_by = $this->username;
		$table->updated_by = "-";
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Adding Schedule ".$type);
		return redirect()->route('schedule-view', [$type]);
	}

	public function scheduleEdit($type,$id)
	{
		$data["schedule"] = M_Schedule::find($id);

		$data["data_transport"] = M_Transport::where(['type_transport' => $type,'status' => 'active'])->get();

		$data["data_route"] = M_Route::where(['status' => 'active'])->get();

		$data["type"] = $type;
		$data["parent"] = "schedule ".$type;
		$data["parent_menu"] = "schedule ".$type." view";
		return $this->viewAdmin("Admin.Schedule.Schedule-edit",$data);
	}

	public function scheduleUpdate(Request $param,$type)
	{
		$date = explode(" - ", $param->date);
		$param['d_date'] = date("Y-m-d", strtotime($date[0]));
		$param['a_date'] = date("Y-m-d", strtotime($date[1]));

		$table = M_Schedule::find($param->id_schedule);
		$table->transport_id = $param->transport;
		$table->route_id = $param->route;
		$table->departure_date = $param->d_date;
		$table->departure_time = $param->d_time;
		$table->arrival_date = $param->a_date;
		$table->arrival_time = $param->a_time;
		$table->description_schedule = $param->description;
		$table->type_schedule = $type;
		$table->updated_by = $this->username;
		$table->status = "active";
		$affected = $table->save();
		$this->setSession($affected, "Updating Schedule ".$type);
		return redirect()->route('schedule-view', [$type]);
	}

	public function scheduleDelete($type,$id)
	{
		$table = M_Schedule::find($id);
		$affected = $table->delete();
		$this->setSession($affected, "Deleting Schedule ".$type);
		return redirect()->route('schedule-view', [$type]);
	}

	public function encryptPass($pass)
	{
		echo Crypt::encryptString($pass);
	}

}
