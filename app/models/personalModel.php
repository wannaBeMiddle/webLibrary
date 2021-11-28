<?php

namespace app\models;

class personalModel extends \app\vendor\Model
{
	public function index() : array
	{
		$result = [];
		$id = $this->sessions->getSession('USER')['id'];
		$sql = "SELECT * FROM `orders` WHERE `user` = :id";
		$response = $this->db->execPDO($sql, [$id]);
		if($response['status'])
		{
			$result['orders'] = $response['data'];
		}
		$response = $this->db->getUserInfo($id);
		if($response['status'])
		{
			$result['user'] = $response;
		}
		return $result;
	}
}