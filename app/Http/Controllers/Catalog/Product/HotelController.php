<?php namespace App\Http\Controllers\Catalog\Product;

use App\Http\Controllers\Catalog\Controller;
use Redirect;
use Input;
use Lang;
use Route;
use App\Models\Catalog\Hotel;
use App\Models\Catalog\Room;
use App\Models\Catalog\AttributeHotel;
use App\Models\Catalog\AttributeHotelDescription;
use App\Models\Catalog\AttributeGroupHotel;
use App\Models\Catalog\AttributeGroupHotelDescription;
use App\Models\Catalog\RoomPrice;
use App\Models\Common\Currency;

class HotelController extends Controller{
	public function index()
	{
		$data['title']="Hotel";
		$data['select_night']=array();
		$data['select_adults']=array();
		$data['select_rooms']=array();
		$data['select_children']=array();
		for($i=1;$i<=10;$i++){
			$data['select_night'][]=$i;
			$data['select_adults'][]=$i;
			$data['select_rooms'][]=$i;
			$data['select_children'][]=$i;
		}
		$hotels=Hotel::select('hotels.id','hotels.image','hotels.star','hotels.wifi','hotel_descriptions.name')
								->join('hotel_descriptions','hotels.id','=','hotel_descriptions.hotelID')
								->where('hotel_descriptions.name','like','%'.Input::get('hotel').'%')
								->where('hotel_descriptions.languageID',Lang::get('language.id'))
								->orderBy('hotels.id','desc')->paginate(10);;
		$i=0;
		foreach ($hotels as $hotel) {
			$data['hotels'][$i]=array(
					'id'		=>	$hotel->id,
					'name'		=>	$hotel->name,
					'image'		=>	$hotel->image,
					'star'		=>	$hotel->star,
					'wifi'		=>	$hotel->wifi,
				);
			$rooms=Room::select('rooms.id','rooms.quantity','room_descriptions.short_description','room_descriptions.name')
								->join('room_descriptions','rooms.id','=','room_descriptions.roomID')
								->where('room_descriptions.languageID',Lang::get('language.id'))
								->where('rooms.hotelID','=',$hotel->id)
								->orderBy('rooms.id','desc')->paginate(6);
			foreach ($rooms as $room) {
				$total;
				$night = ((strtotime(Input::get('check_out')) - strtotime(Input::get('check_in')))/24/3600) + 1;
				$prices=RoomPrice::where('roomID',$room->id)->get();
				$datenext = 0;
				$total=0;
				for($u=1;$u<=$night;$u++){
					foreach ($prices as $value) {
						if ((strtotime(Input::get('check_out'))+$datenext>=strtotime($value['date_to']))&&(strtotime(Input::get('check_in'))+$datenext<=strtotime($value['date_form']))){
							$price = $value['price_gross'];
						}else{
							$price=0;
						}
						$total += $price;
					}
					$datenext += 3600*24;
				}
				$data['hotels'][$i]['rooms'][]=array(
						'id'		=>	$room->id,
						'name'		=>	$room->name,
						'quantity'	=>	$room->quantity,
						'room_deal'	=>	html_entity_decode($room->short_description, ENT_QUOTES, 'UTF-8'),
						'price'		=>	Currency::format($total),
					);
			}
			$i++;
		}
		return view('catalog.product.hotel.search',$data);
	}
	public function show($lacale,$id,$title)
	{
		$data['title']="Hotel";
		$data['select_night']=array();
		$data['select_adults']=array();
		$data['select_rooms']=array();
		$data['select_children']=array();
		for($i=1;$i<=10;$i++){
			$data['select_night'][]=$i;
			$data['select_adults'][]=$i;
			$data['select_rooms'][]=$i;
			$data['select_children'][]=$i;
		}
		$data['hotel']=Hotel::with('descriptions','images','attributes')->find($id);
		$attributes=$data['hotel']->attributes()->get();
		foreach ($attributes as $key => $attribute) {
			$data['attribute_groups'][$attribute->attributegroupID]['group_name']=AttributeGroupHotelDescription::where('languageID',Lang::get('language.id'))->where('attributegroupID',$attribute->attributegroupID)->first()->name;
			$data['attribute_groups'][$attribute->attributegroupID]['name'][]=AttributeHotelDescription::where('languageID',Lang::get('language.id'))->where('attributeID',$attribute->id)->first()->name;
		}
		$data['rooms']=Room::with('descriptions','images','attributes')->where('hotelID',$data['hotel']->id)->orderBy('id','desc')->paginate(6);
		foreach ($data['rooms'] as $key => $room) {
				$total;
				$night = ((strtotime(Input::get('check_out')) - strtotime(Input::get('check_in')))/24/3600) + 1;
				$prices=RoomPrice::where('roomID',$room->id)->get();
				$datenext = 0;
				$total=0;
				for($u=1;$u<=$night;$u++){
					foreach ($prices as $value) {
						if ((strtotime(Input::get('check_out'))+$datenext>=strtotime($value['date_to']))&&(strtotime(Input::get('check_in'))+$datenext<=strtotime($value['date_form']))){
							$price = $value['price_gross'];
						}else{
							$price=0;
						}
						$total += $price;
					}
					$datenext += 3600*24;
				}
				$data['rooms'][$key]->price=Currency::format($total);
			}
		return view('catalog.product.hotel.show',$data);
	}
}