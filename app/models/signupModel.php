<?php

namespace app\models;

class signupModel extends \app\vendor\Model
{
	public function doReg() : array
	{
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['phone']);
		$password = htmlspecialchars($_POST['password']);
		$repeatPassword = htmlspecialchars($_POST['repeatPassword']);

		$sql = "SELECT * FROM `users` WHERE `email` = :email";
		$response = $this->db->execPDO($sql, [$email]);
		if(!$response['data'])
		{
			if(self::passValidate($password))
			{
				if($password == $repeatPassword)
				{
					$password = self::passwordHash($password);
					$sql = "INSERT INTO `users`(`email`, `phone`, `hashedPassword`) VALUES(:email, :phone, :password)";
					$response = $this->db->execPDO($sql, [$email, $phone, $password]);
					if($response['status'])
					{
						return $response;
					}else
					{
						return [
							'status' => false
						];
					}
				}else
				{
					return [
						'status' => false,
						'description' => 'Пароли не совпадают'
					];
				}
			}else
			{
				return [
					'status' => false,
					'description' => 'Слишком лёгкий пароль'
				];
			}
		}else
		{
			return [
				'status' => false,
				'description' => 'Такой email уже используется'
			];
		}
	}

	static public function passValidate(string $password) : bool
	{
		$isValid = preg_match('/!@#$%^&*()?><.,/', $password);
		if(mb_strlen($password) < 6 AND !$isValid)
		{
			return false;
		}
		return true;
	}

	static public function passwordHash(string $password) : string
	{
		return password_hash($password, PASSWORD_BCRYPT);
	}
}