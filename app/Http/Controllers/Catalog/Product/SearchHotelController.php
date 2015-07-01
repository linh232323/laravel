<?php namespace App\Http\Controllers\Catalog\Product;

use App\Http\Controllers\Catalog\Controller;
use Input;
use Redirect;
use App\Models\Catalog\SearchHotel;
use App\Models\Catalog\Hotel;

class SearchHotelController extends Controller{
	public function index()
	{
		$data['data']=Hotel::join('hotel_descriptions','hotels.id','=','hotel_descriptions.hotelID')->where('name','LIKE','%'.Input::get('search').'%')->orderBy('hotels.id','desc')->paginate(10);
		return view('catalog.product.hotel.search',$data);
	}
}