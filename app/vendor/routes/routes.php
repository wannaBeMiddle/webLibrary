<?php
return [
	'/' => [
		'controller' => 'main',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/auth/' => [
		'controller' => 'auth',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/auth/do/' => [
		'controller' => 'auth',
		'action' => 'do',
		'notAuthAccess' => true
	],
	'/auth/logout/' => [
		'controller' => 'auth',
		'action' => 'logout',
		'notAuthAccess' => true
	],
	'/reg/' => [
		'controller' => 'reg',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/reg/do/' => [
		'controller' => 'reg',
		'action' => 'do',
		'notAuthAccess' => true
	],
	'/filter/' => [
		'controller' => 'main',
		'action' => 'filter',
		'notAuthAccess' => true
	],
];