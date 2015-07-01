<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class HotelDescription extends Model {


	protected $table = 'hotel_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['hotelID', 'languageID', 'name', 'address', 'description', 'short_description', 'tag', 'meta_title', 'meta_description', 'meta_keyword'];

    public function hotels() {
        return $this->belongsTo('App\Models\Catalog\Hotel','hotelID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }
}
