<?php

namespace app\vendor\lib;

class user extends sessions
{
	public function isAuth() : bool
	{
		return parent::isAuth();
	}
}