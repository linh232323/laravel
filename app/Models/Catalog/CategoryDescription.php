<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class CategoryDescription extends Model {


	protected $table = 'category_descriptions';
        
    protected $guarded = array('id');

	protected $fillable = ['categoryID', 'languageID', 'name', 'meta_title', 'meta_keyword', 'meta_description'];

    public function categories() {
        return $this->belongsTo('App\Models\Catalog\Category','categoryID');
    }
    public function languages() {
        return $this->belongsTo('App\Models\Common\Language','laguageID');
    }

}
