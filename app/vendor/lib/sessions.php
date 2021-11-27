<?php

namespace app\vendor\lib;

class sessions
{
	public function __construct()
	{
		session_start();
	}
}