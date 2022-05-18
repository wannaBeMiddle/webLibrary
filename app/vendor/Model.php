<?php

namespace app\vendor;

use app\vendor\lib\db,
	app\vendor\lib\sessions,
	app\vendor\lib\user;

class Model
{
	protected db $db;
	protected sessions $sessions;
	protected user $user;

	protected $headerResults;

	public function __construct()
	{
		$this->setProps();
	}

	final public function setProps()
	{
		require_once "app/vendor/lib/db.php";
		require_once "app/vendor/lib/sessions.php";
		require_once "app/vendor/lib/user.php";
		$this->db = db::getInstance();
		$this->db->setPDO();
		$this->sessions = new sessions();
		$this->user = new user();

		$this->headerResults = $this->setHeaderResults();
	}

	public function setHeaderResults()
	{
		$arResult = [];
		$arResult['AUTH'] = $this->user->isAuth();
		if($arResult['AUTH'])
		{
			$arResult['USER'] = $this->sessions->getSession('USER');
		}
		return $arResult;
	}
}