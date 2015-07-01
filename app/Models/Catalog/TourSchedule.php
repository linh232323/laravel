<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TourSchedule extends Model {


	protected $table = 'tour_schedules';
        
    protected $guarded = array('id');

	protected $fillable = ['tourID', 'languageID', 'serial', 'title', 'text', 'transporter'];

    public function tours() {
        return $this->belongsTo('App\Models\Catalog\Tour','tourID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }
}
