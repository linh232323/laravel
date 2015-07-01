<?php namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class TourCategory extends Model {

	protected $table = 'category_tours';
        
    protected $guarded = array('id');

	protected $fillable = ['tour_id', 'category_id'];

}
