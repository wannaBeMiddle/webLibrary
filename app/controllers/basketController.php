<?php

namespace app\controllers;

class basketController extends \app\vendor\Controller
{
	public function indexAction()
	{
		self::$view->render('basket', true);
	}
}