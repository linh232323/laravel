<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use App\Models\Catalog\AttributeRoom;
use App\Models\Catalog\AttributeRoomDescription;
use App\Models\Catalog\AttributeGroupRoom;
use App\Models\Catalog\AttributeGroupRoomDescription;
use App\Models\Common\Language;


class AttributeRoomController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lists=AttributeRoom::with('descriptions')->orderBy('name','asc')->paginate(10);
		return view('admin.attribute.list')->with('title',"Room Attribute")->with('lists',$lists)->with('route','room');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$languages=Language::all();
		$groups=AttributeGroupRoom::lists('name','id');
		return view('admin.attribute.create')->with('title',"Create Room Attribute")->with('groups',$groups)->with('route','room')->with('languages',$languages);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),AttributeRoom::rules(),AttributeRoom::langs());
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get('attribute_description_1'),
					'attributegroupID'	=>	Input::get('attribute_group_id'),
					'sort_order'		=>	Input::get('sort_order'),
				);
			$data=AttributeRoom::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("attribute_description_$value->id"),
						'attributeID'		=>	$data->id,
						'languageID'		=>	$value->id,
					);
				AttributeRoomDescription::create($descriptions);
			}
			return Redirect::route('admin.attribute.room.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attribute.room.create')->with('error',$valid->errors()->first())->withInput();
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
		$data['data']=AttributeRoom::with('descriptions')->find($id);
		if($data['data']){
			$data['groups']=AttributeGroupRoom::lists('name','id');
			$data['title']="Edit Room Attribute: ".$data['data']->name;
			$data['languages']=Language::all();
			$data['route']="room";
			return view('Admin.attribute.edit',$data);
		}else{
			return Redirect::route('admin.attribute.room.index')->with('error',"Error");
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
		$data=AttributeRoom::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),AttributeRoom::rules(),AttributeRoom::langs());
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get('attribute_description_1'),
						'attributegroupID'	=>	Input::get('attribute_group_id'),
						'sort_order'		=>	Input::get('sort_order'),
					);
				$data->update($Update);
				AttributeRoomDescription::where('attributeID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("attribute_description_$value->id"),
							'attributeID'		=>	$data->id,
							'languageID'		=>	$value->id,
						);
					AttributeRoomDescription::create($descriptions);
				}
				return Redirect::route('admin.attribute.room.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.attribute.room.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.attribute.room.index')->with('error',"Error");
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
		$data=AttributeRoom::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.attribute.room.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attribute.room.index')->with('error',"Error");
		}
	}

}
	