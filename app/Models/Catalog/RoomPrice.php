<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class RoomPrice extends Model {

	protected $table = 'room_prices';
        
    protected $guarded = array('id');

	protected $fillable = ['roomID', 'price_net', 'price_percent', 'price_gross', 'extra_net', 'extra_percent', 'extra_gross', 'discount', 'date_form', 'date_to'];

    public function rooms() {
        return $this->belongsTo('App\Models\Catalog\Room','roomID');
    }
}
