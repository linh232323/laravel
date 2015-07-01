<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class HotelCategory extends Model {

	protected $table = 'category_hotels';
        
    protected $guarded = array('id');

	protected $fillable = ['hotel_id', 'category_id'];

}
