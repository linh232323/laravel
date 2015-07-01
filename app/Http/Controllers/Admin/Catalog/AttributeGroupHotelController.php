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

class AttributeGroupHotelController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lists=AttributeGroupHotel::with('descriptions')->orderBy('name','asc')->paginate(10);
		return view('admin.attribute.group.list')->with('title',"Hotel Attribute Group")->with('lists',$lists)->with('route','hotel');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$languages=Language::all();
		return view('admin.attribute.group.create')->with('title',"Create Hotel Attribute Group")->with('route','hotel')->with('languages',$languages);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),AttributeGroupHotel::rules(),AttributeGroupHotel::langs());
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get('attribute_group_description_1'),
					'sort_order'		=>	Input::get('sort_order'),
				);
			$data=AttributeGroupHotel::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("attribute_group_description_$value->id"),
						'attributegroupID'	=>	$data->id,
						'languageID'		=>	$value->id,
					);
				AttributeGroupHotelDescription::create($descriptions);
			}
			return Redirect::route('admin.attributegroup.hotel.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attributegroup.hotel.create')->with('error',$valid->errors()->first())->withInput();
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
		$data['data']=AttributeGroupHotel::with('descriptions')->find($id);
		if($data['data']){
			$data['languages']=Language::all();
			$data['title']="Edit Hotel Attribute Group: ".$data['data']->name;
			$data['route']="hotel";
			return view('admin.attribute.group.edit',$data);
		}else{
			return Redirect::route('admin.attributegroup.hotel.index')->with('error',"Error");
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
		$data=AttributeGroupHotel::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),AttributeGroupHotel::rules(),AttributeGroupHotel::langs());
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get('attribute_group_description_1'),
						'sort_order'		=>	Input::get('sort_order'),
					);
				$data->update($Update);
				AttributeGroupHotelDescription::where('attributegroupID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("attribute_group_description_$value->id"),
							'attributegroupID'	=>	$data->id,
							'languageID'		=>	$value->id,
						);
					AttributeGroupHotelDescription::create($descriptions);
				}
				return Redirect::route('admin.attributegroup.hotel.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.attributegroup.hotel.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.attributegroup.hotel.index')->with('error',"Error");
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
		$group=AttributeGroupHotel::find($id);
		if($group){
			$group->delete();
			return Redirect::route('admin.attributegroup.hotel.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attributegroup.hotel.index')->with('error',"Error");
		}
	}

}
