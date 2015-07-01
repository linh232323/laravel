<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model {


	protected $table = 'hotel_images';
        
    protected $guarded = array('id');

	protected $fillable = ['hotelID', 'image', 'sort_order'];

    public function hotels() {
        return $this->belongsTo('App\Models\Catalog\Hotel','hotelID');
    }
}
