<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;

class Room extends Model {


	protected $table = 'rooms';
        
    protected $guarded = array('id');

	protected $fillable = ['model', 'quantity', 'stock_status_id', 'image', 'date_available', 'minimum', 'status', 'maxadults', 'minimum', 'sort_order', 'hotelID', 'userID', 'usergroupID'];

    public function users() {
        return $this->belongsTo('App\Models\User\User','userID');
    }
    public function usergroups() {
        return $this->belongsTo('App\Models\User\Group','usergroupID');
    }
    public function hotels() {
        return $this->belongsTo('App\Models\Catalog\Hotel','hotelID');
    }
    public function descriptions() {
        return $this->hasMany('App\Models\Catalog\RoomDescription','roomID');
    }
    public function images() {
        return $this->hasMany('App\Models\Catalog\RoomImage','roomID');
    }
    public function prices() {
        return $this->hasMany('App\Models\Catalog\RoomPrice','roomID');
    }
    public function attributes() {
        return $this->belongsToMany('App\Models\Catalog\AttributeRoom','room_attributes')->withTimestamps();
    }
    public static function langs(){
        $langs=array(
            'sort_order.required'           =>  'Sort Order must be numeric and not empty !!',
            'sort_order.numeric'            =>  'Sort Order must be numeric !!',
            'quantity.required'             =>  'Quantity must be numeric and not empty !!',
            'quantity.numeric'              =>  'Quantity must be numeric !!',
            'minimum.required'              =>  'Min Adults must be numeric and not empty !!',
            'minimum.numeric'               =>  'Min Adults must be numeric !!',
            'maxadults.required'            =>  'Max Adults must be numeric and not empty !!',
            'maxadults.numeric'             =>  'Max Adults must be numeric !!',
            'price.required'                =>  "Price You can't leave price empty !!",
            'image.required'                 =>  'You need insert image !!',
        );
        $languages=Language::all();
        foreach ($languages as $key => $value) {
            $lang=array(
                    "name_$value->id.required"             =>  "$value[name]: You can't leave hotel name empty !!",
                    "name_$value->id.min"                  =>  "$value[name] Hotel Name: Use at least :min characters !!",
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
            'sort_order'            =>   'required|numeric',
            'quantity'              =>   'required|numeric',
            'minimum'               =>   'required|numeric',
            'maxadults'             =>   'required|numeric',
            'price'                 =>   'required',
        );
        $languages=Language::all();
        foreach ($languages as $key => $value) {
            $rule=array(
                    "name_$value->id"                  =>  "required|min:4",
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
