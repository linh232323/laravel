<?php namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {


	protected $table = 'user_groups';
        
    protected $guarded = array('id');

	protected $fillable = ['name', 'permission'];

    public function users() {
        return $this->hasMany('App\Models\User\User','user_group_id');
    }
	public function hotels(){
		return $this->hasMany("App\Models\Catalog\Hotel","usergroupID");
	}
    public static $langs=array(
			'name.required'		=>	"You can't leave name empty !!",
			'name.min'			=>	'Name: Use at least :min characters !!',
			'name.unique'		=>	'Someone already has that name. Try another?',
		);
	public static $rules=array(
			'name'		=>	'required|min:5||unique:user_groups,name',
		);

}
