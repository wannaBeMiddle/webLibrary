<?php

namespace app\controllers;

use app\models\authModel;
use \app\vendor\Controller;

class authController extends Controller
{
	public function __construct()
	{
		$this->model = new authModel();
		parent::__construct();
	}

	public function indexAction()
	{
		$response['USER'] = $this->model->setHeaderResults();
		self::$view->render('auth', true, $response);
	}
}