<?php

namespace app\controllers;

use app\models\personalModel;

class personalController extends \app\vendor\Controller
{

	public function __construct()
	{
		$this->model = new personalModel();
		parent::__construct();
	}

	public function indexAction()
	{
		$response = $this->model->index();
		self::$view->render('personal', true, $response);
	}
}