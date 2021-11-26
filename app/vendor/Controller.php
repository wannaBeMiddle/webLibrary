<?php

namespace app\vendor;

class Controller
{
	static protected View $view;

	public function __construct()
	{
		self::$view = new View();
	}
}