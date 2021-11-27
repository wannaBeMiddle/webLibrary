<?php

namespace app\vendor;

class Controller
{
	static protected View $view;
	protected $model;

	public function __construct()
	{
		self::$view = new View();
	}
}