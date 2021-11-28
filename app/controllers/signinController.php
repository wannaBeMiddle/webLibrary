<?php

namespace app\controllers;

use app\models\signinModel;

class signinController extends \app\vendor\Controller
{
	public function __construct()
	{
		$this->model = new signinModel();
		parent::__construct();
	}

	public function indexAction()
	{
		$this::$view->render('signin', true);
	}

	public function doAuthAction()
	{
		$response = $this->model->doAuth();
		if($response['status'])
		{
			header('Location: /');
		}
		$this::$view->render('signin', true, $response);
	}
}