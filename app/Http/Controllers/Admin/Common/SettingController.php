<?php namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Admin\AdminController;
use Auth;
use Input;
use Request;
use Redirect;
use Response;
use Validator;
use App\Http\Requestst;
use App\Models\Common\Setting;

class SettingController extends AdminController{
	public function index()
	{
		$lists=Setting::orderBy('id','desc')->paginate(10);
		return view('admin.common.setting.list')->with('title',"Setting")->with('lists',$lists);
	}
	public function create()
	{
		$zone_id=array(
				"" =>  " --- Please Select --- ",
				"1" =>  "An Giang",
				"2" =>  "Ba Ria-Vung Tau",
				"3" =>  "Bac Giang",
				"4" =>  "Bac Kan",
				"5" =>  "Bac Lieu",
				"6" =>  "Bac Ninh",
				"7" =>  "Ben Tre",
				"8" =>  "Binh Dinh",
				"9" =>  "Binh Duong",
				"10" =>  "Binh Phuoc",
				"11" =>  "Binh Thuan",
				"12" =>  "Ca Mau",
				"13" =>  "Can Tho",
				"14" =>  "Cao Bang",
				"15" =>  "Da Nang",
				"16" =>  "Dak Lak",
				"17" =>  "Dak Nong",
				"18" =>  "Dien Bien",
				"19" =>  "Dong Nai",
				"20" =>  "Dong Thap",
				"21" =>  "Gia Lai",
				"22" =>  "Ha Giang",
				"23" =>  "Ha Nam",
				"24" =>  "Ha Noi",
				"25" =>  "Ha Tay",
				"26" =>  "Ha Tinh",
				"27" =>  "Hai Duong",
				"28" =>  "Hai Phong",
				"29" =>  "Hau Giang",
				"30" =>  "Ho Chi Minh City",
				"31" =>  "Hoa Binh",
				"32" =>  "Hung Yen",
			);
		return view('admin.common.setting.create')->with('title',"Create Setting")->with('zone_id',$zone_id);
	}
	public function store()
	{
		$valid=Validator::make(Input::all(),Setting::rules(),Setting::langs());
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get("name"),
					'image'				=>	Input::get("image"),
					'address'			=>	Input::get('address'),
					'status'			=>	Input::get('status'),
					'icon'				=>	Input::get('icon'),
					'logo'				=>	Input::get('logo'),
					'fax'				=>	Input::get('fax'),
					'telephone'			=>	Input::get('telephone'),
					'zone_id'			=>	Input::get('zone_id'),
					'protocol'			=>	Input::get('protocol'),
					'smtp_hostname'		=>	Input::get('smtp_hostname'),
					'smtp_username'		=>	Input::get('smtp_username'),
					'smtp_password'		=>	Input::get('smtp_password'),
					'smtp_port'			=>	Input::get('smtp_port'),
					'smtp_timeout'		=>	Input::get('smtp_timeout'),
				);
			$data=Setting::create($Insert);
			return Redirect::route('admin.setting.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.setting.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data['data']=Setting::with('descriptions')->find($id);
		if($data['data']){
			$data['title']="Edit Setting: ".$data['data']->name;
			$data['zone_id']=array(
				"" =>  " --- Please Select --- ",
				"1" =>  "An Giang",
				"2" =>  "Ba Ria-Vung Tau",
				"3" =>  "Bac Giang",
				"4" =>  "Bac Kan",
				"5" =>  "Bac Lieu",
				"6" =>  "Bac Ninh",
				"7" =>  "Ben Tre",
				"8" =>  "Binh Dinh",
				"9" =>  "Binh Duong",
				"10" =>  "Binh Phuoc",
				"11" =>  "Binh Thuan",
				"12" =>  "Ca Mau",
				"13" =>  "Can Tho",
				"14" =>  "Cao Bang",
				"15" =>  "Da Nang",
				"16" =>  "Dak Lak",
				"17" =>  "Dak Nong",
				"18" =>  "Dien Bien",
				"19" =>  "Dong Nai",
				"20" =>  "Dong Thap",
				"21" =>  "Gia Lai",
				"22" =>  "Ha Giang",
				"23" =>  "Ha Nam",
				"24" =>  "Ha Noi",
				"25" =>  "Ha Tay",
				"26" =>  "Ha Tinh",
				"27" =>  "Hai Duong",
				"28" =>  "Hai Phong",
				"29" =>  "Hau Giang",
				"30" =>  "Ho Chi Minh City",
				"31" =>  "Hoa Binh",
				"32" =>  "Hung Yen",
			);
			return view('admin.common.setting.edit',$data);
		}else{
			return Redirect::route('admin.setting.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Setting::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),Setting::rules(),Setting::langs());
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get("name"),
						'image'				=>	Input::get("image"),
						'address'			=>	Input::get('address'),
						'status'			=>	Input::get('status'),
						'icon'				=>	Input::get('icon'),
						'logo'				=>	Input::get('logo'),
						'fax'				=>	Input::get('fax'),
						'telephone'			=>	Input::get('telephone'),
						'zone_id'			=>	Input::get('zone_id'),
						'protocol'			=>	Input::get('protocol'),
						'smtp_hostname'		=>	Input::get('smtp_hostname'),
						'smtp_username'		=>	Input::get('smtp_username'),
						'smtp_password'		=>	Input::get('smtp_password'),
						'smtp_port'			=>	Input::get('smtp_port'),
						'smtp_timeout'		=>	Input::get('smtp_timeout'),
					);
				$data->update($Update);
				return Redirect::route('admin.setting.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.setting.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.setting.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$data=Setting::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.setting.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.setting.index')->with('error',"Error");

		}
	}
}