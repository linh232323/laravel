<?php namespace App\Http\Middleware;

class Locale {

	public function __construct($lang)
	{
		Lang::setLocale($lang);
	}
}
