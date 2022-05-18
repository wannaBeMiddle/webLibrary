<?php
return [
	'/webLibrary/' => [
		'controller' => 'main',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/webLibrary/auth/' => [
		'controller' => 'auth',
		'action' => 'index',
		'notAuthAccess' => true
	]
];