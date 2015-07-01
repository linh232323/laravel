<?php namespace App\Http\Controllers\Catalog\Product;

use App\Http\Controllers\Catalog\Controller;
use Redirect;
use Input;
use Lang;
use Route;
use App\Models\Catalog\Room;
use App\Models\Catalog\AttributeRoom;
use App\Models\Catalog\AttributeRoomDescription;
use App\Models\Catalog\AttributeGroupRoom;
use App\Models\Catalog\AttributeGroupRoomDescription;
use App\Models\Catalog\RoomPrice;
use App\Models\Common\Currency;

class RoomController extends Controller{
	public function show($lacale,$id,$title)
	{
		$data['title']="Room";
		$data['room']=Room::with('descriptions','images','attributes')->find($id);
		$attributes=$data['room']->attributes()->get();
		$data['attribute_groups']=array();
		foreach ($attributes as $key => $attribute) {
			$data['attribute_groups'][$attribute->attributegroupID]['group_name']=AttributeGroupRoomDescription::where('languageID',Lang::get('language.id'))->where('attributegroupID',$attribute->attributegroupID)->first()->name;
			$data['attribute_groups'][$attribute->attributegroupID]['name'][]=AttributeRoomDescription::where('languageID',Lang::get('language.id'))->where('attributeID',$attribute->id)->first()->name;
		}
		$total;
		$night = ((strtotime(Input::get('check_out')) - strtotime(Input::get('check_in')))/24/3600) + 1;
		$prices=RoomPrice::where('roomID',$data['room']->id)->get();
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
		$data['room']->price=Currency::format($total);
		return view('catalog.product.room.show',$data);
	}
}