<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TransporterDescription extends Model {


	protected $table = 'transporter_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['transporterID', 'languageID', 'name'];

    public function transporters() {
        return $this->belongsTo('App\Models\Catalog\Transporter','transporterID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }

}
