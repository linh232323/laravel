<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use Response;
use App\Http\Requestst;
use App\Models\Catalog\Category;
use App\Models\Catalog\CategoryDescription;
use App\Models\Common\Language;
use Auth;

class CategoryController extends AdminController{
	public function index()
	{
		$lists=Category::with('descriptions')->orderBy('name','asc')->paginate(10);
		return view('admin.category.list')->with('title',"Category")->with('lists',$lists);
	}
	public function create()
	{
		$categories=Category::lists('name','id');
		$languages=Language::all();
		return view('admin.category.create')->with('title',"Create Category")->with('categories',$categories)->with('languages',$languages);
	}
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),Category::rules(),Category::langs());
		if($valid->passes()){
			if(Input::get("parent_id")!=0){
				$parent=Category::find(Input::get("parent_id"));
				$name=$parent->name . " - " .  Input::get("category_name_1");
			}else{
				$name=Input::get("category_name_1");
			}
			$Insert=array(
					'name'				=>	$name,
					'parent_id'			=>	Input::get("parent_id"),
					'column'			=>	Input::get("column"),
					'menu'		 		=>	Input::get("menu"),
					'sort_order'		=>	Input::get("sort_order"),
					'status'			=>	Input::get("status"),
					'typeID'			=>	$parent->typeID,
				);
			$data=Category::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("category_name_$value->id"),
						'meta_title'		=>	Input::get("category_meta_title_$value->id"),
						'meta_description'	=>	Input::get("category_meta_description_$value->id"),
						'meta_keyword'		=>	Input::get("category_meta_keyword_$value->id"),
						'categoryID'		=>	$data->id,
						'languageID'		=>	$value->id,
					);
				CategoryDescription::create($descriptions);
			}
			return Redirect::route('admin.category.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.category.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data['data']=Category::with('descriptions')->find($id);
		if($data['data']){
			$data['parent']=Category::lists('name','id');
			$data['title']="Edit Category: ".$data['data']->name;
			$data['languages']=Language::all();
			return view('admin.category.edit',$data);
		}else{
			return Redirect::route('admin.category.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Category::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),Category::rules(),Category::langs());
			if($valid->passes()){
				if(Input::get("parent_id")!=0){
					$parent=Category::find(Input::get("parent_id"));
					$name=$parent->name . " - " .  Input::get("category_name_1");
				}else{
					$name=Input::get("category_name_1");
				}
				$Update=array(
						'name'				=>	$name,
						'parent_id'			=>	Input::get("parent_id"),
						'column'			=>	Input::get("column"),
						'menu'		 		=>	Input::get("menu"),
						'sort_order'		=>	Input::get("sort_order"),
						'status'			=>	Input::get("status"),
						'typeID'			=>	$parent->typeID,
					);
				$data->update($Update);
				CategoryDescription::where('categoryID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("category_name_$value->id"),
							'meta_title'		=>	Input::get("category_meta_title_$value->id"),
							'meta_description'	=>	Input::get("category_meta_description_$value->id"),
							'meta_keyword'		=>	Input::get("category_meta_keyword_$value->id"),
							'categoryID'		=>	$data->id,
							'languageID'		=>	$value->id,
						);
					CategoryDescription::create($descriptions);
				}
				return Redirect::route('admin.category.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.category.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.category.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$cate=Category::find($id);
		if($cate){
			$cate->delete();
			return Redirect::route('admin.category.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.category.index')->with('error',"Error");

		}
	}
}