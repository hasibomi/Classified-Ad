<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $fillable = ["user_name", "email", "mobile", "profession", "date_of_birth", "user_thana", "user_district", "address", "user_password", "is_admin"];

	public function district()
	{
		return $this->belongsTo("District", "user_district", "id");
	}

	public function thana()
	{
		return $this->belongsTo("Thana", "user_thana", "id");
	}

}
