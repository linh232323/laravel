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


class AttributeGroupRoomController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$lists=AttributeGroupRoom::with('descriptions')->orderBy('name','asc')->paginate(10);
		return view('admin.attribute.group.list')->with('title',"Room Attribute Group")->with('lists',$lists)->with('route','room');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$languages=Language::all();
		return view('admin.attribute.group.create')->with('title',"Create Room Attribute Group")->with('route','room')->with('languages',$languages);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),AttributeGroupRoom::rules(),AttributeGroupRoom::langs());
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get('attribute_group_description_1'),
					'sort_order'		=>	Input::get('sort_order'),
				);
			$data=AttributeGroupRoom::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("attribute_group_description_$value->id"),
						'attributegroupID'	=>	$data->id,
						'languageID'		=>	$value->id,
					);
				AttributeGroupRoomDescription::create($descriptions);
			}
			return Redirect::route('admin.attributegroup.room.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attributegroup.room.create')->with('error',$valid->errors()->first())->withInput();
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
		$data['data']=AttributeGroupRoom::with('descriptions')->find($id);
		if($data['data']){
		$data['languages']=Language::all();
		$data['title']="Edit Room Attribute Group: ".$data['data']->name;
		$data['route']="room";
		return view('admin.attribute.group.edit',$data);
		}else{
			return route('admin.attributegroup.room.index')->with('error',"Error");
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
		$data=AttributeGroupRoom::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),AttributeGroupRoom::rules(),AttributeGroupRoom::langs());
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get('attribute_group_description_1'),
						'sort_order'		=>	Input::get('sort_order'),
					);
				$data->update($Update);
				AttributeGroupRoomDescription::where('attributegroupID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("attribute_group_description_$value->id"),
							'attributegroupID'	=>	$data->id,
							'languageID'		=>	$value->id,
						);
					AttributeGroupRoomDescription::create($descriptions);
				}
				return Redirect::route('admin.attributegroup.room.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.attributegroup.room.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return route('admin.attributegroup.room.index')->with('error',"Error");
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
		$group=AttributeGroupRoom::find($id);
		if($group){
			$group->delete();
			return Redirect::route('admin.attributegroup.room.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.attributegroup.room.index')->with('error',"Error");
		}
	}

}
