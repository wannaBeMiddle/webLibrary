<?php

namespace app\vendor\lib;

class validate
{
	static public function phoneValidate(string $phone) : bool
	{
	    return preg_match("^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$", $phone);
	}

	static public function loginValidate(string $login) : bool
	{
	    return mb_strlen($login) > 6;
	}

	static public function passwordValidate(string $password) : bool
	{
	    return preg_match("/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g", $password);
	}
}