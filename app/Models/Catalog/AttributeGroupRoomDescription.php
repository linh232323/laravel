<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class AttributeGroupRoomDescription extends Model {


	protected $table = 'attribute_group_room_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['attributegroupID', 'languageID', 'name'];

    public function attribute_groups() {
        return $this->belongsTo('App\Models\Catalog\AttributeGroupRoom','attributegroupID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }

}
