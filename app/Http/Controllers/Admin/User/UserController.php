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

class UserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		Auth::loginUsingID(1);
		$list=User::with('groups')->paginate(10);
		return view('admin.user.list')->with('title',"User")->with('lists',$list);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$group=Group::lists('name','id');
		return view('admin.user.create')->with('title',"Create User")->with('groups',$group);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$valid=Validator::make(Input::all(),User::$create_rules,User::$langs);
		if($valid->passes()){
			$dataInsert=array(
					'username'			=>	Input::get('username'),
					'password'			=>	Input::get('password'),
					'firstname'			=>	Input::get('firstname'),
					'lastname'			=>	Input::get('lastname'),
					'user_group_id'		=>	Input::get('user_group_id'),
					'email'				=>	Input::get('email'),
					'status'			=>	Input::get('status'),
					'ip'				=>	Request::getClientIp(),
				);
			$user=User::create($dataInsert);
			Auth::login($user);
			return Redirect::route('admin.user.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.user.create')->with('error',$valid->errors()->first())->withInput();
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
		$group=Group::lists('name','id');
		$data=User::select('id','firstname','lastname','status','user_group_id')->find($id);
		return view('admin.user.edit')->with('title',"Edit User: $data->firstname $data->lastname")->with('data',$data)->with('groups',$group);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user=User::find($id);
		if($user){
			$valid=Validator::make(Input::all(),User::$edit_rules,User::$langs);
			if($valid->passes()){
				$user->user_group_id=Input::get('user_group_id');
				$user->firstname=Input::get('firstname');
				$user->lastname=Input::get('lastname');
				$user->ip=Request::getClientIp();
				$user->status=Input::get('status');
				$user->save();
				return Redirect::route('admin.user.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.user.edit',array('id'=>$user->id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.user.index')->with('error',"User not available");
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
		$user=User::find($id);
		if($user){
			$user->delete();
			return Redirect::route('admin.user.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.user.index')->with('error',"Error");

		}
	}

}
