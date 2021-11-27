<?php

namespace app\controllers;

class personalController extends \app\vendor\Controller
{
	public function indexAction()
	{
		self::$view->render('personal', true);
	}
}