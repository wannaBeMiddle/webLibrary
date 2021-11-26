<?php

namespace app\vendor;

class View
{
	public function render(string $view, bool $needTemplate, array $arResult = null)
	{
		if($needTemplate)
		{
			require_once "app/views/templates/header.php";
		}
		require_once "app/views/{$view}.php";
		if($needTemplate)
		{
			require_once "app/views/templates/footer.php";
		}
	}
}