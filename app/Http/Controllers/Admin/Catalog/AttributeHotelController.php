<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use App\Models\Catalog\AttributeHotel;
use App\Models\Catalog\AttributeHotelDescription;
use App\Models\Catalog\AttributeGroupHotel;
use App\Models\Catalog\AttributeGroupHotelDescription;
use App\Models\Common\Language;


class AttributeHotelController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lists=AttributeHotel::with('descriptions')->orderBy('name','asc')->paginate(10);
		return view('admin.attribute.list')->with('title',"Hotel Attribute")->with('lists',$lists)->with('route','hotel');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$languages=Language::all();
		$groups=AttributeGroupHotel::lists('name','id');
		return view('admin.attribute.create')->with('title',"Create Hotel Attribute")->with('groups',$groups)->with('route','hotel')->with('languages',$languages);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),AttributeHotel::rules(),AttributeHotel::langs());
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get('attribute_description_1'),
					'attributegroupID'	=>	Input::get('attribute_group_id'),
					'sort_order'		=>	Input::get('sort_order'),
				);
			$data=AttributeHotel::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("attribute_description_$value->id"),
						'attributeID'		=>	$data->id,
						'languageID'		=>	$value->id,
					);
				AttributeHotelDescription::create($descriptions);
			}
			return Redirect::route('admin.attribute.hotel.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attribute.hotel.create')->with('error',$valid->errors()->first())->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['data']=AttributeHotel::with('descriptions')->find($id);
		if($data['data']){
			$data['groups']=AttributeGroupHotel::lists('name','id');
			$data['title']="Edit Hotel Attribute: ".$data['data']->name;
			$data['languages']=Language::all();
			$data['route']="hotel";
			return view('Admin.attribute.edit',$data);
		}else{
			return Redirect::route('admin.attribute.hotel.index')->with('error',"Error");
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$data=AttributeHotel::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),AttributeHotel::rules(),AttributeHotel::langs());
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get('attribute_description_1'),
						'attributegroupID'	=>	Input::get('attribute_group_id'),
						'sort_order'		=>	Input::get('sort_order'),
					);
				$data->update($Update);
				AttributeHotelDescription::where('attributeID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("attribute_description_$value->id"),
							'attributeID'		=>	$data->id,
							'languageID'		=>	$value->id,
						);
					AttributeHotelDescription::create($descriptions);
				}
				return Redirect::route('admin.attribute.hotel.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.attribute.hotel.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.attribute.hotel.index')->with('error',"Error");
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$data=AttributeHotel::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.attribute.hotel.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attribute.hotel.index')->with('error',"Error");
		}
	}

}
	