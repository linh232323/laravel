<?php namespace App\Models\User;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';
        
    protected $guarded = array('id');

        /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['username', 'email', 'password', 'firstname', 'lastname', 'status', 'user_group_id', 'image', 'ip', 'remember_token'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
        
    public function groups() {
        return $this->belongsTo('App\Models\User\Group','user_group_id');
    }
	public function hotels(){
		return $this->hasMany("App\Models\Catalog\Hotel","userID");
	}
    public static $langs=array(
			"firstname.required"					=>	"You can't leave first name empty !!",
			"lastname.required"						=>	"You can't leave last name empty !!",
			"email.required"						=>	"You can't leave email empty !!",
			"username.required"						=>	"You can't leave username empty  !!",
			"password.required"						=>	"You can't leave password empty  !!",
			"oldpassword.required"					=>	"You can't leave old password empty  !!",
			"confirm.required"						=>	"You can't leave confirm empty  !!",
			"username.min"							=>	"Username: Use at least :min characters !!",
			"password.min"							=>	"Password: Use at least :min characters !!",
			"email.email"							=>	"The email address is not valid ",
			"email.unique"							=>	"Someone already has that email. Try another?",
			"username.unique"						=>	"Someone already has that username. Try another?",
			"confirm.same"							=>	"These passwords don't match. Try again?",
		);
	public static $create_rules=array(
			'username'		=>	'required|min:5|unique:users,username',
			"firstname"		=>	"required",
			"lastname"		=>	"required",
			'email'			=>	'email|required|min:5|unique:users,email',
			'password'		=>	'required|min:5',
			"confirm"		=>	"required|same:password",
		);
	public static $edit_rules=array(
			"firstname"		=>	"required",
			"lastname"		=>	"required",
		);

}
