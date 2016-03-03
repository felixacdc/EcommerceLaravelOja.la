<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {
	protected $guarded = array();

	public static $rules = array();

	use UserTrait, RemindableTrait;

	protected $hidden = array('password', 'remember_token');

	public function getRememberToken ()
	{
		return null;
	}

	public function setRemenberToken ()
	{

	}

	public function getRememberTokenName ()
	{
		return null;
	}

	public function setAttribute ($key, $value)
	{
		return null;
	}
}
