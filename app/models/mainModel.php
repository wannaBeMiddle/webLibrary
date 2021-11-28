<?php

namespace app\models;

class mainModel extends \app\vendor\Model
{
	public function index() : array
	{
		$sql = "SELECT * FROM `products`";
		$response = $this->db->execPDO($sql);
		if($response['status'])
		{
			return $response;
		}
		return [
			'status' => false
		];
	}
}