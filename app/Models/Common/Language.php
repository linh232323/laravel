<?php namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Language extends Model {


	protected $table = 'languages';
        
    protected $guarded = array('id');

	protected $fillable = ['name', 'code', 'locale', 'image', 'directory', 'sort_order', 'status'];

    public function categorys() {
        return $this->hasMany('App\Models\Catalog\CategoryDescription','languageID');
    }
    public function attribute_hotels() {
        return $this->hasMany('App\Models\Catalog\AttributeHotelDescription','languageID');
    }
    public function attribute_group_hotels() {
        return $this->hasMany('App\Models\Catalog\AttributeGroupHotelDescription','languageID');
    }
    public function attribute_rooms() {
        return $this->hasMany('App\Models\Catalog\AttributeRoomDescription','languageID');
    }
    public function attribute_group_rooms() {
        return $this->hasMany('App\Models\Catalog\AttributeGroupRoomDescription','languageID');
    }
    public function hotels() {
        return $this->hasMany('App\Models\Catalog\HotelDescription','languageID');
    }
    public function rooms() {
        return $this->hasMany('App\Models\Catalog\RoomDescription','languageID');
    }
    public function transporters() {
        return $this->hasMany('App\Models\Catalog\TransporterDescription','languageID');
    }
    public function tours() {
        return $this->hasMany('App\Models\Catalog\TourDescription','languageID');
    }
    public function tour_schedules() {
        return $this->hasMany('App\Models\Catalog\TourScheduleDescription','languageID');
    }
    public function tour_attentions() {
        return $this->hasMany('App\Models\Catalog\TourAttentionDescription','languageID');
    }

    public static $langs=array(
            'sort_order.required'                   =>  'Sort Order must be numeric and not empty !!',
            'sort_order.numeric'                    =>  'Sort Order must be numeric !!',
            'name.required'                         =>  "You can't leave name empty !!",
            'locale.required'                       =>  "You can't leave locale empty !!",
            'code.required'                         =>  "You can't leave code empty !!",
            'image.required'                        =>  "You can't leave image empty !!",
            'directory.required'                    =>  "You can't leave directory empty !!",
        );
    public static $rules=array(
            'sort_order'    =>  'required|numeric',
            'name'          =>  "required",
            'code'          =>  "required",
            'locale'        =>  "required",
            'image'         =>  "required",
            'directory'     =>  "required",
        );
}
