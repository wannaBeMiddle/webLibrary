<?php

namespace app\controllers;

use app\models\basketModel;

class basketController extends \app\vendor\Controller
{

	public function __construct()
	{
		$this->model = new basketModel();
		parent::__construct();
	}

	public function indexAction()
	{
		$response = $this->model->index();
		self::$view->render('basket', true, $response);
	}

	public function setProductAction($params)
	{
		$this->model->setProduct($params);
	}

	public function deleteAction($params)
	{
		$response = $this->model->delete($params);
		if($response)
		{
			$this->indexAction();
		}
	}

	public function payAction($params)
	{
		$response = $this->model->pay($params);
		if($response)
		{
			$this->indexAction();
		}
	}
}