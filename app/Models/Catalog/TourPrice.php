<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TourPrice extends Model {

	protected $table = 'tour_adults';
        
    protected $guarded = array('id');

	protected $fillable = ['tourID', 'adult_net', 'adult_percent', 'adult_gross', 'child_net', 'child_percent', 'child_gross', 'bady_net', 'bady_percent', 'bady_gross', 'discount', 'date_form', 'date_to'];

    public function tours() {
        return $this->belongsTo('App\Models\Catalog\Tour','tourID');
    }
}
