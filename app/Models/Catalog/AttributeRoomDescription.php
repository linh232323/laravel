<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class AttributeRoomDescription extends Model {


	protected $table = 'attribute_room_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['attributeID', 'languageID', 'name'];

    public function attributes() {
        return $this->belongsTo('App\Models\Catalog\AttributeRoom','attributeID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }

}
