<?php

namespace app\controllers;

class mainController extends \app\vendor\Controller
{
	public function indexAction()
	{
		self::$view->render('main', true);
	}
}