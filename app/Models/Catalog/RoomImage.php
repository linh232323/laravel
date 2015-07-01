<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class RoomImage extends Model {


	protected $table = 'room_images';
        
    protected $guarded = array('id');

	protected $fillable = ['roomID', 'image', 'sort_order'];

    public function hotels() {
        return $this->belongsTo('App\Models\Catalog\Room','roomID');
    }
}
