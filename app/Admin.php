<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
	use Notifiable;

	// @var
	protected $rememberTokenName = false;
	protected $table = 'admin';
	protected $primaryKey = 'id_admin';
	protected $fillable = [
		'username_admin', 'password_admin',
	];
	protected $hidden = [
		'password_admin',
	];
}
