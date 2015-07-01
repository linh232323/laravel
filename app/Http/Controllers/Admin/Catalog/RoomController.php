<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Auth;
use Validator;
use Input;
use Redirect;
use Request;
use Response;
use App\Http\Requestst;
use App\Models\Catalog\Room;
use App\Models\Catalog\RoomImage;
use App\Models\Catalog\RoomPrice;
use App\Models\Catalog\RoomAttribute;
use App\Models\Catalog\RoomDescription;
use App\Models\Catalog\AttributeRoom;
use App\Models\Catalog\AttributeGroupRoom;
use App\Models\Common\Language;

class RoomController extends AdminController{
	public function getList($id){
		$lists=Room::with('descriptions')->where('hotelID',$id)->orderBy('id','desc')->paginate(10);
		return view('admin.room.list')->with('title',"Room")->with('rooms',$lists)->with('hotel_id',$id);
	}
	public function getCreate($hotel_id){
		$languages=Language::all();
		$attributegroups=AttributeGroupRoom::with('descriptions')->get();
		$attributes=AttributeRoom::with('descriptions')->get();
		return view('admin.room.create')->with('title',"Create Room")->with('hotel_id',$hotel_id)->with('attributes',$attributes)->with('attributegroups',$attributegroups)->with('languages',$languages);
	}
	public function getAttribute(){
		$attribute_group_id=Input::get("id");
		$attributes=AttributeRoom::where('attributegroupID',$attribute_group_id)->get();
		$str="<select name='attribute_id[]' id='input-status' class='form-control'>";
			foreach ($attributes as $attribute) {
				$str.="<option value=".$attribute->id.">".$attribute->name."</option>";
			}
		$str.="</select>";
		return $str;
	}
	public function postCreate(){
		$languages=Language::all();
		$valid=Validator::make(Input::all(),Room::rules(),Room::langs());
		if($valid->passes()){
			$Insert=array(
					'image'				=>	Input::get("image"),
					'quantity'			=>	Input::get("quantity"),
					'minumum'			=>	Input::get("minumum"),
					'maxadults'			=>	Input::get("maxadults"),
					'hotelID'			=>	Input::get("hotel_id"),
					'date_available'	=>	Input::get("date_available"),
					'sort_order'		=>	Input::get("sort_order"),
					'status'			=>	Input::get("status"),
					'userID'			=>	Auth::user()->id,
					'usergroupID'		=>	Auth::user()->groups->id,
				);
			$data=Room::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("name_$value->id"),
						'description'		=>	Input::get("description_$value->id"),
						'short_description'	=>	Input::get("short_description_$value->id"),
						'meta_title'		=>	Input::get("meta_title_$value->id"),
						'meta_description'	=>	Input::get("meta_description_$value->id"),
						'meta_keyword'		=>	Input::get("meta_keyword_$value->id"),
						'roomID'			=>	$data->id,
						'languageID'		=>	$value->id,
					);
				RoomDescription::create($descriptions);
			}
			foreach (Input::get("price") as $key => $value) {
				$price=array(
						'roomID'		=>	$data->id,
						'price_net'		=>	$value['price_net'],
						'price_percent'	=>	$value['price_percent'],
						'price_gross'	=>	$value['price_net']+$value['price_net']*$value['price_percent']/100,
						'extra_net'		=>	$value['extra_net'],
						'extra_percent'	=>	$value['extra_percent'],
						'extra_gross'	=>	$value['extra_net']+$value['extra_net']*$value['extra_percent']/100,
						'discount'		=>	$value['discount'],
						'date_form'		=>	$value['date_form'],
						'date_to'		=>	$value['date_to'],
					);
				RoomPrice::create($price);
				$price=array();
			}
			if(Input::get("attribute_id")){
				foreach (Input::get("attribute_id") as $key => $attr) {
					$attrCheck=RoomAttribute::where('attribute_room_id',$attr)->where('room_id',$data->id)->first();
					if(!$attrCheck){
						$data->attributes()->attach($attr);
					}
				}
			}
			if(Input::get("slide")){
				foreach (Input::get("slide") as $key => $image) {
					$img=array(
							'roomID'		=>	$data->id,
							'image'			=>	$image['image'],
							'sort_order'	=>	$image['sort_order']
						);
					RoomImage::create($img);
				}
			}
			return Redirect::route('admin.hotel.edit',array('id'=>Input::get("hotel_id")))->with('success',"Success");
		}else{
			return Redirect::route('room_create_get',array('id'=>Input::get("hotel_id")))->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function postDelete(){
		if(Request::ajax()){
			$data=Room::find(Input::get("id"));
			if($data){
				$data->delete();
				return Response::json(array('mess'=>"0"));
			}else{
				return Response::json(array('mess'=>"0"));
			}
		}
	}
	public function getEdit($id){
		$data['data']=Room::with('descriptions')->find($id);
		if($data['data']){
			$data['title']="Edit Room: ".$data['data']->name;
			$data['attributegroups']=AttributeGroupRoom::with('descriptions')->get();
			$data['attributes']=AttributeRoom::with('descriptions')->get();
			$data['languages']=Language::all();
			return view('admin.room.edit',$data);
		}else{
			return Redirect::route('admin.hotel.index')->with('error',"Error");
		}
	}
	public function postEdit(){
		$data=Room::find(Input::get("id"));
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),Room::rules(),Room::langs());
			if($valid->passes()){
				$Update=array(
						'image'				=>	Input::get("image"),
						'quantity'			=>	Input::get("quantity"),
						'minumum'			=>	Input::get("minumum"),
						'maxadults'			=>	Input::get("maxadults"),
						'date_available'	=>	Input::get("date_available"),
						'sort_order'		=>	Input::get("sort_order"),
						'status'			=>	Input::get("status"),
					);
				$data->update($Update);
				RoomDescription::where('roomID',Input::get("id"))->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("name_$value->id"),
							'description'		=>	Input::get("description_$value->id"),
							'short_description'	=>	Input::get("short_description_$value->id"),
							'meta_title'		=>	Input::get("meta_title_$value->id"),
							'meta_description'	=>	Input::get("meta_description_$value->id"),
							'meta_keyword'		=>	Input::get("meta_keyword_$value->id"),
							'roomID'			=>	$data->id,
							'languageID'		=>	$value->id,
						);
					RoomDescription::create($descriptions);
				}
				RoomPrice::where('roomID',Input::get("id"))->delete();
				foreach (Input::get("price") as $key => $value) {
					$price=array(
							'roomID'		=>	Input::get("id"),
							'price_net'		=>	$value['price_net'],
							'price_percent'	=>	$value['price_percent'],
							'price_gross'	=>	$value['price_net']+$value['price_net']*$value['price_percent']/100,
							'extra_net'		=>	$value['extra_net'],
							'extra_percent'	=>	$value['extra_percent'],
							'extra_gross'	=>	$value['extra_net']+$value['extra_net']*$value['extra_percent']/100,
							'discount'		=>	$value['discount'],
							'date_form'		=>	$value['date_form'],
							'date_to'		=>	$value['date_to'],
						);
					RoomPrice::create($price);
					$price=array();
				}
				RoomAttribute::where('room_id',Input::get("id"))->delete();
				if(Input::get("attribute_id")){
					foreach (Input::get("attribute_id") as $key => $attr) {
						$attrCheck=RoomAttribute::where('attribute_room_id',$attr)->where('room_id',Input::get("id"))->get();
						if(count($attrCheck)==0){
							$data->attributes()->attach($attr);
						}
					}
				}
				RoomImage::where('roomID',Input::get("id"))->delete();
				if(Input::get("slide")){
					foreach (Input::get("slide") as $key => $image) {
						$img=array(
								'roomID'		=>	$data->id,
								'image'			=>	$image['image'],
								'sort_order'	=>	$image['sort_order']
							);
						RoomImage::create($img);
					}
				}
				return Redirect::route('admin.hotel.edit',array('id'=>$data->hotelID))->with('success',"Success");
			}else{
				return Redirect::route('room_edit_get',array('id'=>Input::get("id")))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.hotel.index')->with('error',"Error");
		}
	}
}