<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use App\Models\Common\Language;

class Tour extends Model {


	protected $table = 'tours';
        
    protected $guarded = array('id');

	protected $fillable = ['stock_status_id', 'image', 'departure_time', 'date_available', 'adult', 'child', 'baby', 'days', 'nights', 'status', 'minimum', 'sort_order', 'userID', 'usergroupID'];

    public function users() {
        return $this->belongsTo('App\Models\User\User','userID');
    }
    public function usergroups() {
        return $this->belongsTo('App\Models\User\Group','usergroupID');
    }
    public function categories() {
        return $this->belongsToMany('App\Models\Catalog\Category','category_tours')->withTimestamps();
    }
    public function descriptions() {
        return $this->hasMany('App\Models\Catalog\TourDescription','tourID');
    }
    public function images() {
        return $this->hasMany('App\Models\Catalog\TourImage','tourID');
    }
    public function prices() {
        return $this->hasMany('App\Models\Catalog\TourPrice','tourID');
    }
    public function schedules() {
        return $this->hasMany('App\Models\Catalog\TourSchedule','tourID');
    }
    public function attentions() {
        return $this->hasMany('App\Models\Catalog\TourAttention','tourID');
    }
    public static function langs(){
        $langs=array(
            'sort_order.required'           =>  'Sort Order must be numeric and not empty !!',
            'sort_order.numeric'            =>  'Sort Order must be numeric !!',
            'adult.required'                =>  'Adult must be numeric and not empty !!',
            'adult.numeric'                 =>  'Adult must be numeric !!',
            'child.required'                =>  'Child(5-12) must be numeric and not empty !!',
            'child.numeric'                 =>  'Child(5-12) must be numeric !!',
            'baby.required'                 =>  'Child(0-5) must be numeric and not empty !!',
            'baby.numeric'                  =>  'Child(0-5) must be numeric !!',
            'category_id.required'          =>  'You need select category !!',
            'price.required'                =>  "Price You can't leave meta keyword empty !!",
            'image.required'                 =>  'You need insert image !!',
        );
        $languages=Language::all();
        foreach ($languages as $key => $value) {
            $lang=array(
                    "name_$value->id.required"             =>  "$value[name]: You can't leave tour name empty !!",
                    "name_$value->id.min"                  =>  "$value[name] Hotel Name: Use at least :min characters !!",
                    // "description_$value->id.required"      =>  "$value[name]: You can't leave description empty !!",
                    // "description_$value->id.min"           =>  "$value[name] Description: Use at least :min characters !!",
                    // "information_$value->id.required"      =>  "$value[name]: You can't leave short description empty !!",
                    // "information_$value->id.min"           =>  "$value[name] Short Description: Use at least :min characters !!",
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
            'category_id'           =>   'required',
            'price'                 =>   'required',
        );
        $languages=Language::all();
        foreach ($languages as $key => $value) {
            $rule=array(
                    "name_$value->id"                  =>  "required|min:4",
                    // "description_$value->id"           =>  "required|min:4",
                    // "information_$value->id"           =>  "required|min:4",
                    // "meta_title_$value->id"            =>  "required|min:4",
                    // "meta_description_$value->id"      =>  "required|min:4",
                    // "meta_keyword_$value->id"          =>  "required|min:4",
                );
            $rules=array_merge($rules,$rule);
        }
        return $rules;
    }
}
