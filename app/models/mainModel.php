<?php

namespace app\models;

class mainModel extends \app\vendor\Model
{
	public function index()
	{
		$this->db->getUserInfo(1);
	}
}