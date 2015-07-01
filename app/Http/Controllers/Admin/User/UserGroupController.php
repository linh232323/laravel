<?php namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use Response;
use App\Http\Requestst;
use App\Models\User\Group;
use App\Models\User\User;
use Auth;


class UserGroupController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$list=Group::with('users')->paginate(10);
		return view('admin.user.group.list')->with('title',"User Groups")->with('lists',$list);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.user.group.create')->with('title',"Create User");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid=Validator::make(Input::all(),Group::$rules,Group::$langs);
		if($valid->passes()){
			$dataInsert=array(
				'name'	=>	Input::get('name')
			);
			Group::create($dataInsert);
			return Redirect::route('admin.usergroup.index')->with('title',"User Groups")->with('success','Success');
		}else{
			return Redirect::route('admin.usergroup.create')->with('title',"Create User")->withInput()->with('error',$valid->errors()->first());
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
		$data=Group::find($id);
		return view('admin.user.group.edit')->with('title',"Edit User: ".$data->name)->with('data',$data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$group=Group::find($id);
		if($group){
			$valid=Validator::make(Input::all(),Group::$rules,Group::$langs);
			if($valid->passes()){
				$group->name=Input::get('name');
				$group->save();
				return Redirect::route('admin.usergroup.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.usergroup.edit',array('id'=>$group->id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.usergroup.index')->with('error',"User Groups not available");
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
		$group=Group::find($id);
		if($group){
			$group->delete();
			return Redirect::route('admin.usergroup.index')->with('title',"User Groups")->with('success',"Success");
		}else{
			return Redirect::route('admin.usergroup.index')->with('title',"User Groups")->with('error',"Error");

		}
	}

}
