<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use App\Models\Catalog\Hotel;
use App\Models\Catalog\HotelImage;
use App\Models\Catalog\HotelCategory;
use App\Models\Catalog\HotelAttribute;
use App\Models\Catalog\HotelDescription;
use App\Models\Catalog\Category;
use App\Models\Catalog\AttributeHotel;
use App\Models\Catalog\AttributeGroupHotel;
use App\Models\Catalog\CategoryDescription;
use App\Models\Common\Language;
use Auth;

class HotelController extends AdminController{
	public function index()
	{
		$lists=Hotel::with('descriptions')->orderBy('id','desc')->paginate(10);
		return view('admin.hotel.list')->with('title',"Hotel")->with('lists',$lists);
	}
	public function create()
	{
		$languages=Language::all();
		$categories=Category::where('typeID',1)->lists('name','id');
		$attributegroups=AttributeGroupHotel::with('descriptions')->get();
		$attributes=AttributeHotel::with('descriptions')->get();
		return view('admin.hotel.create')->with('title',"Create Hotel")->with('categories',$categories)->with('languages',$languages)->with('attributes',$attributes)->with('attributegroups',$attributegroups);
	}
	public function getAttribute()
	{
		$attribute_group_id=Input::get("id");
		$attributes=AttributeHotel::where('attributegroupID',$attribute_group_id)->get();
		$str="<select name='attribute_id[]' id='input-status' class='form-control'>";
			foreach ($attributes as $attribute) {
				$str.="<option value=".$attribute->id.">".$attribute->name."</option>";
			}
		$str.="</select>";
		return $str;
	}
	public function getCategory()
	{
		$id=Input::get("id");
		$category=Category::where('id',$id)->first();
		$str="<div class='cate'><input type='hidden' name='category_id[]' value='".$id."'> ".$category->name;
		$str.="<a href='' onClick='$(this).parent().remove()'> <i class='fa fa-minus-circle'></i> </a></div>";
		return $str;
	}
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),Hotel::rules(),Hotel::langs());
		if($valid->passes()){
			$Insert=array(
					'date_available'	=>	Input::get("date_available"),
					'image'				=>	Input::get("image"),
					'star'				=>	Input::get("star"),
					'wifi'		 		=>	Input::get("wifi"),
					'maps_apil'			=>	Input::get("maps_apil"),
					'maps_apir'			=>	Input::get("maps_apir"),
					'sort_order'		=>	Input::get("sort_order"),
					'status'			=>	Input::get("status"),
					'userID'			=>	Auth::user()->id,
					'usergroupID'		=>	Auth::user()->groups->id,
				);
			$data=Hotel::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("name_$value->id"),
						'address'			=>	Input::get("address_$value->id"),
						'description'		=>	Input::get("description_$value->id"),
						'short_description'	=>	Input::get("short_description_$value->id"),
						'meta_title'		=>	Input::get("meta_title_$value->id"),
						'meta_description'	=>	Input::get("meta_description_$value->id"),
						'meta_keyword'		=>	Input::get("meta_keyword_$value->id"),
						'hotelID'			=>	$data->id,
						'languageID'		=>	$value->id,
					);
				HotelDescription::create($descriptions);
			}
			foreach (Input::get("category_id") as $key => $cate) {
				$cateCheck=HotelCategory::where('category_id',$cate)->where('hotel_id',$data->id)->first();
				if(!$cateCheck){
					$data->categories()->attach($cate);
				}
			}
			if(Input::get("attribute_id")){
				foreach (Input::get("attribute_id") as $key => $attr) {
					$attrCheck=HotelAttribute::where('attribute_hotel_id',$attr)->where('hotel_id',$data->id)->first();
					if(!$attrCheck){
						$data->attributes()->attach($attr);
					}
				}
			}
			if(Input::get("slide")){
				foreach (Input::get("slide") as $key => $image) {
					$img=array(
							'hotelID'		=>	$data->id,
							'image'			=>	$image['image'],
							'sort_order'	=>	$image['sort_order']
						);
					HotelImage::create($img);
				}
			}
			return Redirect::route('admin.hotel.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.hotel.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data['data']=Hotel::with('descriptions')->find($id);
		if($data['data']){
			$data['title']="Edit Hotel: ".$data['data']->name;
			$data['categories']=Category::where('typeID',1)->lists('name','id');
			$data['attributegroups']=AttributeGroupHotel::with('descriptions')->get();
			$data['attributes']=AttributeHotel::with('descriptions')->get();
			$data['languages']=Language::all();
			return view('admin.hotel.edit',$data);
		}else{
			return Redirect::route('admin.hotel.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Hotel::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),Hotel::rules(),Hotel::langs());
			if($valid->passes()){
				$Update=array(
						'image'				=>	Input::get("image"),
						'date_available'	=>	Input::get("date_available"),
						'star'				=>	Input::get("star"),
						'wifi'		 		=>	Input::get("wifi"),
						'maps_apil'			=>	Input::get("maps_apil"),
						'maps_apir'			=>	Input::get("maps_apir"),
						'sort_order'		=>	Input::get("sort_order"),
						'status'			=>	Input::get("status"),
					);
				$data->update($Update);
				HotelDescription::where('hotelID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("name_$value->id"),
							'address'			=>	Input::get("address_$value->id"),
							'description'		=>	Input::get("description_$value->id"),
							'short_description'	=>	Input::get("short_description_$value->id"),
							'meta_title'		=>	Input::get("meta_title_$value->id"),
							'meta_description'	=>	Input::get("meta_description_$value->id"),
							'meta_keyword'		=>	Input::get("meta_keyword_$value->id"),
							'hotelID'			=>	$data->id,
							'languageID'		=>	$value->id,
						);
					HotelDescription::create($descriptions);
				}
				HotelCategory::where('hotel_id',$id)->delete();
				foreach (Input::get("category_id") as $key => $cate) {
					$cateCheck=HotelCategory::where('category_id',$cate)->where('hotel_id',$id)->get();
					if(count($cateCheck)==0){
						$data->categories()->attach($cate);
					}
				}
				HotelAttribute::where('hotel_id',$id)->delete();
				if(Input::get("attribute_id")){
					foreach (Input::get("attribute_id") as $key => $attr) {
						$attrCheck=HotelAttribute::where('attribute_hotel_id',$attr)->where('hotel_id',$id)->get();
						if(count($attrCheck)==0){
							$data->attributes()->attach($attr);
						}
					}
				}
				HotelImage::where('hotelID',$id)->delete();
				if(Input::get("slide")){
					foreach (Input::get("slide") as $key => $image) {
						$img=array(
								'hotelID'		=>	$data->id,
								'image'			=>	$image['image'],
								'sort_order'	=>	$image['sort_order']
							);
						HotelImage::create($img);
					}
				}
				return Redirect::route('admin.hotel.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.hotel.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.hotel.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$data=Hotel::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.hotel.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.hotel.index')->with('error',"Error");

		}
	}
}