<?php

namespace app\vendor;

use app\vendor\lib\db,
	app\vendor\lib\sessions;

class Model
{
	protected db $db;
	protected sessions $sessions;

	public function __construct()
	{
		$this->setProps();
	}

	final public function setProps()
	{
		require_once "app/vendor/lib/db.php";
		require_once "app/vendor/lib/sessions.php";
		$this->db = db::getInstance();
		$this->db->setPDO();
		$this->sessions = new sessions();
	}
}