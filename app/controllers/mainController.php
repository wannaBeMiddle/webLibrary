<?php

namespace app\controllers;

use app\models\mainModel;

class mainController extends \app\vendor\Controller
{
	public function __construct()
	{
		$this->model = new mainModel();
		parent::__construct();
	}

	public function indexAction()
	{
		$response = $this->model->index();
		self::$view->render('main', true, $response);
	}
}