<?php

namespace app\models;

class signinModel extends \app\vendor\Model
{
	public function doAuth()
	{
		$email = htmlspecialchars($_POST['email']);
		$password = $_POST['password'];

		if(mb_strlen($password) < 1)
		{
			return [
				'status' => false,
				'description' => 'Вы не ввели пароль'
			];
		}else
		{
			$sql = "SELECT * FROM `users` WHERE `email` = :email";
			$response = $this->db->execPDO($sql, [$email]);
			if($response['data'])
			{
				if(password_verify($password, $response['data'][0]['hashedPassword']))
				{
					$this->sessions->doAuth($response['data'][0]['id']);
					return [
						'status' => true
					];
				}else
				{
					return [
						'status' => false,
						'description' => 'Неправильный пароль'
					];
				}
			}else
			{
				return [
					'status' => false,
					'description' => 'Такой пользователь не найден'
				];
			}
		}
	}
}