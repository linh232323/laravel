<?php namespace App\Http\Controllers\Admin\Common;

use App\Http\Controllers\Admin\AdminController;
use Validator;
use Input;
use Redirect;
use Request;
use App\Models\Common\Currency;

class CurrencyController extends AdminController{
	public function index()
	{
		$lists=Currency::orderBy('id','desc')->paginate(10);
		return view('admin.common.currency.list')->with('title',"Currency")->with('lists',$lists);
	}
	public function create()
	{
		return view('admin.common.currency.create')->with('title',"Create Currency");
	}
	public function store()
	{
		$valid=Validator::make(Input::all(),Currency::rules(),Currency::langs());
		if($valid->passes()){
			$Insert=array(
					'title'				=>	Input::get('title'),
					'code'				=>	Input::get('code'),
					'symbol_left'		=>	Input::get('symbol_left'),
					'symbol_right'		=>	Input::get('symbol_right'),
					'decimal_place'		=>	Input::get('decimal_place'),
					'status'			=>	Input::get('status'),
					'value'				=>	Input::get('value'),
				);
			$data=Currency::create($Insert);
			return Redirect::route('admin.currency.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.currency.create')->with('error',$valid->errors()->first())->withInput();
		}
	}
	public function edit($id)
	{
		$data=Currency::find($id);
		if($data){
			return view('admin.common.currency.edit')->with('title',"Edit Currency: ".$data->name)->with('data',$data);
		}else{
			return Redirect::route('admin.currency.index')->with('error',"Error");
		}
	}
	public function update($id)
	{
		$data=Currency::find($id);
		if($data){
			$valid=Validator::make(Input::all(),Currency::rules(),Currency::langs());
			if($valid->passes()){
				$Update=array(
						'title'				=>	Input::get('title'),
						'code'				=>	Input::get('code'),
						'symbol_left'		=>	Input::get('symbol_left'),
						'symbol_right'		=>	Input::get('symbol_right'),
						'decimal_place'		=>	Input::get('decimal_place'),
						'status'			=>	Input::get('status'),
						'value'				=>	Input::get('value'),
					);
				$data->update($Update);
				return Redirect::route('admin.currency.index')->with('success',"Success");
			}else{
				return Redirect::route('admin.currency.edit',array('id'=>$id))->with('error',$valid->errors()->first())->withInput();
			}
		}else{
			return Redirect::route('admin.currency.index')->with('error',"Error");
		}
	}
	public function destroy($id)
	{
		$data=Currency::find($id);
		if($data){
			$data->delete();
			return Redirect::route('admin.currency.index')->with('success',"Success");
		}else{
			return Redirect::route('admin.currency.index')->with('error',"Error");

		}
	}
}