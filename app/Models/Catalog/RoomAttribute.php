<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class RoomAttribute extends Model {

	protected $table = 'room_attributes';
        
    protected $guarded = array('id');

	protected $fillable = ['room_id', 'attribute_room_id'];

}
