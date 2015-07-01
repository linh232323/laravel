<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TourDescription extends Model {


	protected $table = 'tour_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['tourID', 'languageID', 'name', 'description', 'information', 'tag', 'meta_title', 'meta_description', 'meta_keyword'];

    public function tours() {
        return $this->belongsTo('App\Models\Catalog\Tour','tourID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }
}
