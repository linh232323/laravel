<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class RoomDescription extends Model {


	protected $table = 'room_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['roomID', 'languageID', 'name', 'description', 'short_description', 'tag', 'meta_title', 'meta_description', 'meta_keyword'];

    public function rooms() {
        return $this->belongsTo('App\Models\Catalog\Room','roomID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }
}
