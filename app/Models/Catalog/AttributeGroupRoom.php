<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;

class AttributeGroupRoom extends Model {


	protected $table = 'attribute_group_rooms';
        
    protected $guarded = array('id');

	protected $fillable = ['name', 'sort_order'];

    public function descriptions() {
        return $this->hasMany('App\Models\Catalog\AttributeGroupRoomDescription','attributegroupID');
    }
    public function attributes() {
        return $this->hasMany('App\Models\Catalog\AttributeRoom','attributegroupID');
    }
	public static function langs(){
		$langs=array(
			'sort_order.required'						=>	'Sort Order must be numeric and not empty !!',
			'sort_order.numeric'						=>	'Sort Order must be numeric !!',
		);
		$languages=Language::all();
		foreach ($languages as $key => $value) {
			$lang=array(
					"attribute_group_description_$value->id.required"	=>	"$value[name]: You can't leave attribute description empty !!",
					"attribute_group_description_$value->id.min"		=>	"$value[name] Attribute Description: Use at least :min characters !!",
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
					"attribute_group_description_$value->id"	=>	"required|min:4",
				);
			$rules=array_merge($rules,$rule);
		}
		return $rules;
	}
}
