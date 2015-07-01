<?php namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use App\Models\Catalog\Transporter;
use App\Models\Catalog\TransporterDescription;
use App\Models\Common\Language;

class TransporterController extends AdminController{
	public function index()
	{
		$lists=Transporter::with('descriptions')->orderBy('name','asc')->paginate(10);
		return view('admin.transporter.list')->with('title',"Transporter")->with('lists',$lists);
	}
	public function create()
	{
		$languages=Language::all();
		return view('admin.transporter.create')->with('title',"Create Transporter")->with('languages',$languages);
	}
	public function store()
	{
		$languages=Language::all();
		$valid=Validator::make(Input::all(),Transporter::rules(),Transporter::langs());
		if($valid->passes()){
			$Insert=array(
					'name'				=>	Input::get('transporter_1'),
					'sort_order'		=>	Input::get('sort_order'),
				);
			$data=Transporter::create($Insert);
			foreach ($languages as $key => $value) {
				$descriptions=array(
						'name'				=>	Input::get("transporter_$value->id"),
						'transporterID'		=>	$data->id,
						'languageID'		=>	$value->id,
					);
				TransporterDescription::create($descriptions);
			}
			return Redirect::route('admin.transporter.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.transporter.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data['data']=Transporter::with('descriptions')->find($id);
		if($data['data']){
			$data['title']="Edit Transporter: ".$data['data']->name;
			$data['languages']=Language::all();
			return view('admin.transporter.edit',$data);
		}else{
			return Redirect::route('admin.transporter.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Transporter::find($id);
		if($data){
			$languages=Language::all();
			$valid=Validator::make(Input::all(),Transporter::rules(),Transporter::langs());
			if($valid->passes()){
				$Update=array(
						'name'				=>	Input::get('transporter_1'),
						'sort_order'		=>	Input::get('sort_order'),
					);
				$data->update($Update);
				TransporterDescription::where('transporterID',$id)->delete();
				foreach ($languages as $key => $value) {
					$descriptions=array(
							'name'				=>	Input::get("transporter_$value->id"),
							'transporterID'		=>	$data->id,
							'languageID'		=>	$value->id,
						);
					TransporterDescription::create($descriptions);
				}
				return Redirect::route('admin.transporter.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.transporter.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.transporter.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$data=Transporter::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.transporter.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.transporter.index')->with('error',"Error");

		}
	}
}