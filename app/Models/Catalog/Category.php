<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;

class Category extends Model {


	protected $table = 'categories';
        
    protected $guarded = array('id');

	protected $fillable = ['name', 'image', 'parent_id', 'top', 'column', 'sort_order', 'status', 'typeID'];

    public function hotels() {
        return $this->belongsToMany('App\Models\Catalog\Hotel','category_hotels')->withTimestamps();
    }
    public function tours() {
        return $this->belongsToMany('App\Models\Catalog\Tour','category_tours')->withTimestamps();
    }
	public function descriptions(){
		return $this->hasMany("App\Models\Catalog\CategoryDescription","categoryID");
	}
	public static function langs(){
		$langs=array(
			'sort_order.required'						=>	'Sort Order must be numeric and not empty !!',
			'sort_order.numeric'						=>	'Sort Order must be numeric !!',
		);
		$languages=Language::all();
		foreach ($languages as $key => $value) {
			$lang=array(
					"category_name_$value->id.required"				=>	"$value[name]: You can't leave category name empty !!",
					"category_name_$value->id.min"					=>	"$value[name] Category Name: Use at least :min characters !!",
					// "category_meta_title_$value->id.required"		=>	"$value[name]: You can't leave meta title empty !!",
					// "category_meta_title_$value->id.min"			=>	"$value[name] Meta Title: Use at least :min characters !!",
					// "category_meta_description_$value->id.required"	=>	"$value[name]: You can't leave meta description empty !!",
					// "category_meta_description_$value->id.min"		=>	"$value[name] Meta Desciption: Use at least :min characters !!",
					// "category_meta_keyword_$value->id.required"		=>	"$value[name]: You can't leave key word empty !!",
					// "category_meta_keyword_$value->id.min"			=>	"$value[name] Key Word: Use at least :min characters !!",
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
					"category_name_$value->id"					=>	"required|min:4",
					// "category_meta_title_$value->id"			=>	"required|min:4",
					// "category_meta_description_$value->id"		=>	"required|min:4",
					// "category_meta_keyword_$value->id"			=>	"required|min:4",
				);
			$rules=array_merge($rules,$rule);
		}
		return $rules;
	}
}
