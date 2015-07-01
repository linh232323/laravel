<?php namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use App\Models\Common\Language;

class LanguageController extends AdminController{
	public function index()
	{
		$lists=Language::orderBy('name','asc')->paginate(10);
		return view('admin.common.language.list')->with('title',"Language")->with('lists',$lists);
	}
	public function create()
	{
		return view('admin.common.language.create')->with('title',"Create Language");
	}
	public function store()
	{
		$valid=Validator::make(Input::all(),Language::$rules,Language::$langs);
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get('name'),
					'code'				=>	Input::get('code'),
					'locale'			=>	Input::get('locale'),
					'image'				=>	Input::get('image'),
					'directory'			=>	Input::get('directory'),
					'status'			=>	Input::get('status'),
					'sort_order'		=>	Input::get('sort_order'),
				);
			$data=Language::create($Insert);
			return Redirect::route('admin.language.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.language.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data=Language::find($id);
		if($data){
			return view('admin.common.language.edit')->with('title',"Edit Language: ".$data->name)->with('data',$data);
		}else{
			return Redirect::route('admin.language.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Language::find($id);
		if($data){
			$valid=Validator::make(Input::all(),Language::$rules,Language::$langs);
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get('name'),
						'code'				=>	Input::get('code'),
						'locale'			=>	Input::get('locale'),
						'image'				=>	Input::get('image'),
						'directory'			=>	Input::get('directory'),
						'status'			=>	Input::get('status'),
						'sort_order'		=>	Input::get('sort_order'),
					);
				$data->update($Update);
				return Redirect::route('admin.language.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.language.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.language.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$data=Language::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.language.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.language.index')->with('error',"Error");

		}
	}
}