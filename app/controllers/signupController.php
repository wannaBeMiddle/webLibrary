<?php

namespace app\controllers;

use app\models\signupModel;

class signupController extends \app\vendor\Controller
{
	public function __construct()
	{
		$this->model = new signupModel();
		parent::__construct();
	}

	public function indexAction()
	{
		$this::$view->render('signup', true);
	}

	public function doRegAction()
	{
		$response = $this->model->doReg();
		if($response['status'])
		{
			header('Location: /signin/');
			die();
		}
		$this::$view->render('signup', true, $response);
	}
}