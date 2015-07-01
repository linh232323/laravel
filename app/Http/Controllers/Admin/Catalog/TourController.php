<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Auth;
use Input;
use Request;
use Redirect;
use Response;
use Validator;
use App\Http\Requestst;
use App\Models\Catalog\Tour;
use App\Models\Catalog\TourImage;
use App\Models\Catalog\TourPrice;
use App\Models\Catalog\TourSchedule;
use App\Models\Catalog\TourAttention;
use App\Models\Catalog\TourCategory;
use App\Models\Catalog\TourAttribute;
use App\Models\Catalog\TourDescription;
use App\Models\Catalog\Transporter;
use App\Models\Catalog\Category;
use App\Models\Catalog\CategoryDescription;
use App\Models\Common\Language;

class TourController extends AdminController{
	public function index()
	{
		$lists=Tour::with('descriptions')->orderBy('id','desc')->paginate(10);
		return view('admin.tour.list')->with('title',"Tour")->with('lists',$lists);
	}
	public function create()
	{
		$languages=Language::all();
		$categories=Category::where('typeID',2)->lists('name','id');
		$transporters=Transporter::lists('name','id');
		return view('admin.tour.create')->with('title',"Create Tour")->with('categories',$categories)->with('transporters',$transporters)->with('languages',$languages);
	}
	public function getCategory()
	{
		$id=Input::get('id');
		$category=Category::where('typeID',2)->where('id',$id)->first();
		$str="<div class='cate'><input type='hidden' name='category_id[]' value='".$id."'> ".$category->name;
		$str.="<a href='' onClick='$(this).parent().remove()'> <i class='fa fa-minus-circle'></i> </a></div>";
		return $str;
	}
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),Tour::rules(),Tour::langs());
		if($valid->passes()){
			$Insert=array(
					'image'				=>	Input::get("image"),
					'adult'				=>	Input::get('adult'),
					'child'				=>	Input::get('child'),
					'baby'				=>	Input::get('baby'),
					'days'				=>	Input::get('days'),
					'night'				=>	Input::get('night'),
					'departure_time'	=>	Input::get('departure_time'),
					'date_available'	=>	Input::get('date_available'),
					'sort_order'		=>	Input::get('sort_order'),
					'status'			=>	Input::get('status'),
					'userID'			=>	Auth::user()->id,
					'usergroupID'		=>	Auth::user()->groups->id,
				);
			$data=Tour::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("name_$value->id"),
						'description'		=>	Input::get("description_$value->id"),
						'information'		=>	Input::get("information_$value->id"),
						'meta_title'		=>	Input::get("meta_title_$value->id"),
						'meta_description'	=>	Input::get("meta_description_$value->id"),
						'meta_keyword'		=>	Input::get("meta_keyword_$value->id"),
						'tourID'			=>	$data->id,
						'languageID'		=>	$value->id,
					);
				TourDescription::create($descriptions);
			}
			$tour=Tour::find($data->id);
			foreach (Input::get('category_id') as $key => $cate) {
				$cateCheck=TourCategory::where('category_id',$cate)->where('tour_id',$data->id)->first();
				if(!$cateCheck){
					$tour->categories()->attach($cate);
				}
			}
			foreach (Input::get('price') as $key => $value) {
				$price=array(
						'tourID'		=>	$data->id,
						'adult_net'		=>	$value['adult_net'],
						'adult_percent'	=>	$value['adult_percent'],
						'adult_gross'	=>	$value['adult_net']+$value['adult_net']*$value['adult_percent']/100,
						'child_net'		=>	$value['child_net'],
						'child_percent'	=>	$value['child_percent'],
						'child_gross'	=>	$value['child_net']+$value['child_net']*$value['child_percent']/100,
						'baby_net'		=>	$value['baby_net'],
						'baby_percent'	=>	$value['baby_percent'],
						'baby_gross'	=>	$value['baby_net']+$value['baby_net']*$value['baby_percent']/100,
						'discount'		=>	$value['discount'],
						'date_form'		=>	$value['date_form'],
						'date_to'		=>	$value['date_to'],
					);
				TourPrice::create($price);
				$price=array();
			}
			$serial=1;
			foreach (Input::get('schedule') as $key => $item) {
				foreach ($languages as $key => $value) {
					$schedule=array(
							'tourID'		=>	$data->id,
							'transporter'	=>	$item["transporter"],
							'title'			=>	$item["title_$value->id"],
							'text'			=>	$item["schedule_$value->id"],
							'serial'		=>	$serial,
							'languageID'	=>	$value->id,
						);
					TourSchedule::create($schedule);
					$schedule=array();
				}
				$serial++;
			}
			$serial=1;
			foreach (Input::get('attention') as $key => $item) {
				foreach ($languages as $key => $value) {
					$attention=array(
							'tourID'		=>	$data->id,
							'title'			=>	$item["title_$value->id"],
							'text'			=>	$item["attention_$value->id"],
							'serial'		=>	$serial,
							'languageID'	=>	$value->id,
						);
					TourAttention::create($attention);
					$attention=array();
				}
				$serial++;
			}
			if(Input::get("slide")){
				foreach (Input::get("slide") as $key => $image) {
					$img=array(
							'tourID'		=>	$data->id,
							'image'			=>	$image['image'],
							'sort_order'	=>	$image['sort_order']
						);
					TourImage::create($img);
				}
			}
			return Redirect::route('admin.tour.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.tour.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data['data']=Tour::with('descriptions')->find($id);
		if($data['data']){
			$data['title']="Edit Tour: ".$data['data']->name;
			$data['categories']=Category::where('typeID',2)->lists('name','id');
			$data['transporters']=Transporter::lists('name','id');
			$data['languages']=Language::all();
			return view('admin.tour.edit',$data);
		}else{
			return Redirect::route('admin.tour.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Tour::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),Tour::rules(),Tour::langs());
			if($valid->passes()){
				$Update=array(
						'image'				=>	Input::get("image"),
						'adult'				=>	Input::get('adult'),
						'child'				=>	Input::get('child'),
						'baby'				=>	Input::get('baby'),
						'days'				=>	Input::get('days'),
						'night'				=>	Input::get('night'),
						'departure_time'	=>	Input::get('departure_time'),
						'date_available'	=>	Input::get('date_available'),
						'sort_order'		=>	Input::get('sort_order'),
						'status'			=>	Input::get('status'),
					);
				$data->update($Update);
				TourDescription::where('tourID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("name_$value->id"),
							'description'		=>	Input::get("description_$value->id"),
							'information'		=>	Input::get("information_$value->id"),
							'meta_title'		=>	Input::get("meta_title_$value->id"),
							'meta_description'	=>	Input::get("meta_description_$value->id"),
							'meta_keyword'		=>	Input::get("meta_keyword_$value->id"),
							'tourID'			=>	$data->id,
							'languageID'		=>	$value->id,
						);
					TourDescription::create($descriptions);
				}
				TourCategory::where('tour_id',$id)->delete();
				foreach (Input::get('category_id') as $key => $cate) {
					$cateCheck=TourCategory::where('category_id',$cate)->where('tour_id',$id)->get();
					if(count($cateCheck)==0){
						$data->categories()->attach($cate);
					}
				}
				TourPrice::where('tourID',$id)->delete();
				foreach (Input::get('price') as $key => $value) {
					$price=array(
							'tourID'		=>	$data->id,
							'adult_net'		=>	$value['adult_net'],
							'adult_percent'	=>	$value['adult_percent'],
							'adult_gross'	=>	$value['adult_net']+$value['adult_net']*$value['adult_percent']/100,
							'child_net'		=>	$value['child_net'],
							'child_percent'	=>	$value['child_percent'],
							'child_gross'	=>	$value['child_net']+$value['child_net']*$value['child_percent']/100,
							'baby_net'		=>	$value['baby_net'],
							'baby_percent'	=>	$value['baby_percent'],
							'baby_gross'	=>	$value['baby_net']+$value['baby_net']*$value['baby_percent']/100,
							'discount'		=>	$value['discount'],
							'date_form'		=>	$value['date_form'],
							'date_to'		=>	$value['date_to'],
						);
					TourPrice::create($price);
					$price=array();
				}
				TourSchedule::where('tourID',$id)->delete();
				$serial=1;
				foreach (Input::get('schedule') as $key => $item) {
					foreach ($languages as $key => $value) {
						$schedule=array(
								'tourID'		=>	$data->id,
								'transporter'	=>	$item["transporter"],
								'title'			=>	$item["title_$value->id"],
								'text'			=>	$item["schedule_$value->id"],
								'serial'		=>	$serial,
								'languageID'	=>	$value->id,
							);
						TourSchedule::create($schedule);
						$schedule=array();
					}
					$serial++;
				}
				TourAttention::where('tourID',$id)->delete();
				$serial=1;
				foreach (Input::get('attention') as $key => $item) {
					foreach ($languages as $key => $value) {
						$attention=array(
								'tourID'		=>	$data->id,
								'title'			=>	$item["title_$value->id"],
								'text'			=>	$item["attention_$value->id"],
								'serial'		=>	$serial,
								'languageID'	=>	$value->id,
							);
						TourAttention::create($attention);
						$attention=array();
					}
					$serial++;
				}
				TourImage::where('tourID',$id)->delete();
				if(Input::get("slide")){
					foreach (Input::get("slide") as $key => $image) {
						$img=array(
								'tourID'		=>	$data->id,
								'image'			=>	$image['image'],
								'sort_order'	=>	$image['sort_order']
							);
						TourImage::create($img);
					}
				}
				return Redirect::route('admin.tour.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.tour.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.tour.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$data=Tour::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.tour.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.tour.index')->with('error',"Error");

		}
	}
}