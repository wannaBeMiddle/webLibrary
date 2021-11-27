<?php

namespace app\vendor\lib;

class db
{
	/*
	 * Реализуем одиночку для того чтобы не было возможности
	 * создать два подключения к БД одновременно
	*/
	private static array $instances = [];
	protected \PDO $pdo;
	protected function __construct(){ }

	protected function __clone() { }
	protected function __wakeup() {}
	public static function getInstance() : db
	{
		$class = static::class;
		if(!isset(static::$instances[$class]))
		{
			static::$instances[$class] = new static();
		}

		return static::$instances[$class];
	}

	public function setPDO()
	{
		$config = require_once "app/configs/config.php";
		$dsn = "{$config['PDO']['driver']}:host={$config['PDO']['host']};dbname={$config['PDO']['dbName']};charset={$config['PDO']['charset']}";
		$opt = [
			\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
			\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
			\PDO::ATTR_EMULATE_PREPARES => false
		];
		$this->pdo = new \PDO($dsn, $config['PDO']['dbUser'], $config['PDO']['dbPassword'], $opt);
	}

	public function execPDO(string $sql, array $arParams = []) : array
	{
		$status = true;
		preg_match_all('/:([A-Za-z0-9_]+)/', $sql, $matches);
		$values = $matches[1];
		if(count($values) != count($arParams))
		{
			return [
				'status' => false,
				'description' => 'Check your param array'
			];
		}
		$stmt = $this->pdo->prepare($sql);
		$requestType = self::getRequestType($sql);
		$response = $stmt->execute($arParams);
		if($response)
		{
			if($requestType == 'SELECT')
			{
				return [
					'status' => true,
					'data' => $stmt->fetchAll()
				];
			}elseif($requestType == 'INSERT')
			{
				return [
					'status' => true,
					'id' => $this->pdo->lastInsertId()
				];
			}
		}
		return [
			'status' => false,
			'description' => 'PDO error'
		];
	}

	static public function getRequestType(string $sql)
	{
		preg_match('/^([A-Za-z]+)/', $sql, $matches);
		if(count($matches) > 0)
		{
			return $matches[0];
		}
		return false;
	}

	public function getUserInfo(int $id) : array
	{
		$id = intval($id);
		if($id < 0)
		{
			return [
				'status' => false,
				'description' => 'Id cannot be < 0'
			];
		}
		$sql = "SELECT * FROM `users` WHERE `id` = :id";
		$user = $this->execPDO($sql, [$id]);
		$sql = "SELECT * FROM `orders` WHERE `user`=:id";
		$orders = $this->execPDO($sql, [$id]);
		return [];
	}
}