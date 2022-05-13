<?php

namespace app\controllers;

use app\models\mainModel;
use \app\vendor\Controller;

class mainController extends Controller
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