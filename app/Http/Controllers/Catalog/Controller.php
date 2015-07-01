<?php namespace App\Http\Controllers\Catalog;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Lang;
use Route;
use Session;
use Request;
use App\Models\Common\Language;
use App\Models\Catalog\Category;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;
	public function __construct(){
		Lang::setLocale(Request::segment(1));
		if(!Session::get('currency')){
			Session::put('currency',1);
		}
	}
}
