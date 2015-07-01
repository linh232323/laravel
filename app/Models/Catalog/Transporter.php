<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;

class Transporter extends Model {


	protected $table = 'transporters';
        
    protected $guarded = array('id');

	protected $fillable = [ 'name', 'sort_order'];

    public function descriptions() {
        return $this->hasMany('App\Models\Catalog\TransporterDescription','transporterID');
    }
    public function tours() {
        return $this->belongsToMany('App\Models\Catalog\Tour','tour_transporters')->withTimestamps();
    }
	public static function langs(){
		$langs=array(
			'sort_order.required'					=>	'Sort Order must be numeric and not empty !!',
			'sort_order.numeric'					=>	'Sort Order must be numeric !!',
		);
		$languages=Language::all();
		foreach ($languages as $key => $value) {
			$lang=array(
					"transporter_$value->id.required"	=>	"$value[name]: You can't leave transporter name empty !!",
					"transporter_$value->id.min"		=>	"$value[name] Transporter: Use at least :min characters !!",
				);
			$langs=array_merge($langs,$lang);
		}
		return $langs;
	}
	public static function rules(){
		$rules=array(
			'sort_order'				=>	'required|numeric',
		);
		$languages=Language::all();
		foreach ($languages as $key => $value) {
			$rule=array(
					"transporter_$value->id"	=>	"required|min:2",
				);
			$rules=array_merge($rules,$rule);
		}
		return $rules;
	}
}
