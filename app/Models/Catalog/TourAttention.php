<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TourAttention extends Model {


	protected $table = 'tour_attentions';
        
    protected $guarded = array('id');

	protected $fillable = ['tourID', 'languageID', 'serial', 'title', 'text'];

    public function tours() {
        return $this->belongsTo('App\Models\Catalog\Room','tourID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }
}
