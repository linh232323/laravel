<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;

class AttributeRoom extends Model {


	protected $table = 'attribute_rooms';
        
    protected $guarded = array('id');

	protected $fillable = ['attributegroupID', 'name', 'sort_order'];

    public function groups() {
        return $this->belongsTo('App\Models\Catalog\AttributeGroupRoom','attributegroupID');
    }
    public function descriptions() {
        return $this->hasMany('App\Models\Catalog\AttributeRoomDescription','attributeID');
    }
    public function rooms() {
        return $this->belongsToMany('App\Models\Catalog\Room','room_attributes')->withTimestamps();
    }
	public static function langs(){
		$langs=array(
			'sort_order.required'						=>	'Sort Order must be numeric and not empty !!',
			'sort_order.numeric'						=>	'Sort Order must be numeric !!',
		);
		$languages=Language::all();
		foreach ($languages as $key => $value) {
			$lang=array(
					"attribute_description_$value->id.required"	=>	"$value[name]: You can't leave attribute description empty !!",
					"attribute_description_$value->id.min"		=>	"$value[name] Attribute Description: Use at least :min characters !!",
				);
			$langs=array_merge($langs,$lang);
		}
		return $langs;
	}
	public static function rules(){
		$rules=array(
			'sort_order'					=>	'required|numeric',
		);
		$languages=Language::all();
		foreach ($languages as $key => $value) {
			$rule=array(
					"attribute_description_$value->id"	=>	"required|min:4",
				);
			$rules=array_merge($rules,$rule);
		}
		return $rules;
	}
}
