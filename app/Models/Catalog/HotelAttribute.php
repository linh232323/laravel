<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class HotelAttribute extends Model {

	protected $table = 'hotel_attributes';
        
    protected $guarded = array('id');

	protected $fillable = ['hotel_id', 'attribute_hotel_id'];

}
