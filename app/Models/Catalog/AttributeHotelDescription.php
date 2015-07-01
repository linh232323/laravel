<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class AttributeHotelDescription extends Model {


	protected $table = 'attribute_hotel_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['attributeID', 'languageID', 'name'];

    public function attributes() {
        return $this->belongsTo('App\Models\Catalog\AttributeHotel','attributeID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }

}
