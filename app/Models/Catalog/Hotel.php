<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;
class Hotel extends Model {


	protected $table = 'hotels';
        
    protected $guarded = array('id');

	protected $fillable = ['model', 'image', 'date_available', 'status', 'star', 'wifi', 'maps_apil', 'maps_apir', 'sort_order', 'userID', 'usergroupID'];

    public function users() {
        return $this->belongsTo('App\Models\User\User','userID');
    }
    public function usergroups() {
        return $this->belongsTo('App\Models\User\Group','usergroupID');
    }
    public function descriptions() {
        return $this->hasMany('App\Models\Catalog\HotelDescription','hotelID');
    }
    public function images() {
        return $this->hasMany('App\Models\Catalog\HotelImage','hotelID');
    }
    public function rooms() {
        return $this->hasMany('App\Models\Catalog\Room','hotelID');
    }
    public function categories() {
        return $this->belongsToMany('App\Models\Catalog\Category','category_hotels')->withTimestamps();
    }
    public function attributes() {
        return $this->belongsToMany('App\Models\Catalog\AttributeHotel','hotel_attributes')->withTimestamps();
    }
    public static function langs(){
        $langs=array(
            'maps_apil.required'            =>  "Maps: You can't leave API left empty !!",
            'maps_apir.required'            =>  "Maps: You can't leave API left empty !!",
            'sort_order.required'           =>  'Sort Order must be numeric and not empty !!',
            'category_id.required'          =>  'You need select category !!',
            'sort_order.numeric'            =>  'Sort Order must be numeric !!',
            'image.required'                 =>  'You need insert image !!',
        );
        $languages=Language::all();
        foreach ($languages as $key => $value) {
            $lang=array(
                    "name_$value->id.required"             =>  "$value[name]: You can't leave hotel name empty !!",
                    "name_$value->id.min"                  =>  "$value[name] Hotel Name: Use at least :min characters !!",
                    "address_$value->id.required"          =>  "$value[name]: You can't leave address empty !!",
                    "address_$value->id.min"               =>  "$value[name] Address: Use at least :min characters !!",
                    // "description_$value->id.required"      =>  "$value[name]: You can't leave description empty !!",
                    // "description_$value->id.min"           =>  "$value[name] Description: Use at least :min characters !!",
                    // "short_description_$value->id.required"=>  "$value[name]: You can't leave short description empty !!",
                    // "short_description_$value->id.min"     =>  "$value[name] Short Description: Use at least :min characters !!",
                    // "meta_title_$value->id.required"       =>  "$value[name]: You can't leave meta title empty !!",
                    // "meta_title_$value->id.min"            =>  "$value[name] Meta Title: Use at least :min characters !!",
                    // "meta_description_$value->id.required" =>  "$value[name]: You can't leave meta description empty !!",
                    // "meta_description_$value->id.min"      =>  "$value[name] Meta Desciption: Use at least :min characters !!",
                    // "meta_keyword_$value->id.required"     =>  "$value[name]: You can't leave key word empty !!",
                    // "meta_keyword_$value->id.min"          =>  "$value[name] Key Word: Use at least :min characters !!",
                );
            $langs=array_merge($langs,$lang);
        }
        return $langs;
    }
    public static function rules(){
        $rules=array(
            'image'                 =>   'required',
            'category_id'           =>   'required',
            'sort_order'            =>   'required|numeric',
            'maps_apil'             =>   'required',
            'maps_apir'             =>   'required',
        );
        $languages=Language::all();
        foreach ($languages as $key => $value) {
            $rule=array(
                    "name_$value->id"                  =>  "required|min:4",
                    "address_$value->id"               =>  "required|min:4",
                    // "description_$value->id"           =>  "required|min:4",
                    // "short_description_$value->id"     =>  "required|min:4",
                    // "meta_title_$value->id"            =>  "required|min:4",
                    // "meta_description_$value->id"      =>  "required|min:4",
                    // "meta_keyword_$value->id"          =>  "required|min:4",
                );
            $rules=array_merge($rules,$rule);
        }
        return $rules;
    }
}
