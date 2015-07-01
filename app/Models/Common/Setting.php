<?php namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {


	protected $table = 'settings';
        
    protected $guarded = array('id');

	protected $fillable = ['name', 'image', 'address', 'status', 'icon', 'logo', 'fax', 'telephone', 'zone_id', 'protocol', 'smtp_hostname', 'smtp_username', 'smtp_password', 'smtp_port', 'smtp_timeout'];

    public static function langs(){
        $langs=array(
            'name.required'                 =>  "You can't leave name empty !!",
            'address.required'              =>  "You can't leave address empty !!",
            'image.required'                =>  'You need insert image !!',
            'icon.required'                 =>  'You need insert icon !!',
            'logo.required'                 =>  'You need insert logo !!',
        );
        return $langs;
    }
    public static function rules(){
        $rules=array(
            'name'                  =>   'required',
            'address'               =>   'required',
            'image'                 =>   'required',
            'icon'                  =>   'required',
            'logo'                  =>   'required',
        );
        return $rules;
    }
}
