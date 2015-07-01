<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TourImage extends Model {


	protected $table = 'tour_images';
        
    protected $guarded = array('id');

	protected $fillable = ['tourID', 'image', 'sort_order'];

    public function hotels() {
        return $this->belongsTo('App\Models\Catalog\Tour','tourID');
    }
}
