<?php

namespace app\vendor;

use Exception;

class Kernel
{
	static public function init()
	{
		$callValues = Router::route();
		if(!$callValues)
		{
			self::prepareCallValues(true);
		}
		self::prepareCallValues(false, $callValues['URIParams'], $callValues['callValues']);
	}

	static public function prepareCallValues( bool $is404, ?array $val, ?array $params) : void
	{
		$actionName = null;
		$modelName = null;
		$controllerExist = file_exists("app/controllers/{$val['controller']}Controller.php");
		$modelExist = file_exists("app/models/{$val['controller']}Model.php");

		if($is404 OR !$controllerExist)
		{
			$message = 'Error - Route wasnt found';
			if(!$controllerExist)
			{
				$message = 'Error - Controller does not exist';
			}
			self::notFound();
		}else
		{
			$controllerName = "{$val['controller']}Controller";
			$modelName = null;

			$actionName = "{$val['action']}Action";
			if(!$modelExist)
			{
				$message = 'Warning -- Model does not exist';
				logWrite($message, "coreErrors");
			}else
			{
				$modelName = "{$val['controller']}Model";
			}
			self::controllerCall($controllerName, $modelName, $actionName, $params);
		}
	}

	static public function controllerCall(string $controllerName, ?string $modelName, ?string $actionName, ?array $params)
	{
		require_once "app/controllers/{$controllerName}.php";
		if(!is_null($modelName))
		{
			require_once "app/model/{$modelName}.php";
		}
		$namespace = '\app\controllers\\' . $controllerName;
		$controller = new $namespace();

		if(method_exists($controller, $actionName))
		{
			$controller->$actionName($params);
		}else
		{
			$message = "Action does not exist";
			logWrite($message, "coreErrors");
			self::notFound();
		}
	}

	public static function notFound()
	{
		require_once "app/controllers/notFoundController.php";
		$controller = new \app\controllers\notFoundController();
		$controller->index();
	}
}