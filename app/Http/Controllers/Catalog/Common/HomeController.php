<?php namespace App\Http\Controllers\Catalog\Common;

use App\Http\Controllers\Catalog\Controller;
use Redirect;
use App\Models\Common\Currency;

class HomeController extends Controller{
	public function index()
	{
		$data['title']="Genuine Tour";
		return view('catalog.common.home',$data);
	}
}