<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class AttributeGroupHotelDescription extends Model {


	protected $table = 'attribute_group_hotel_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['attributegroupID', 'languageID', 'name'];

    public function attribute_groups() {
        return $this->belongsTo('App\Models\Catalog\AttributeGroupHotel','attributegroupID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }

}
