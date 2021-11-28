<?php
return [
	'/' => [
		'controller' => 'main',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/basket/' => [
		'controller' => 'basket',
		'action' => 'index',
		'notAuthAccess' => false
	],
	'/basket/{int}' => [
		'controller' => 'basket',
		'action' => 'setProduct',
		'notAuthAccess' => false
	],
	'/basket/delete/{int}' => [
		'controller' => 'basket',
		'action' => 'delete',
		'notAuthAccess' => false
	],
	'/basket/pay/{int}' => [
		'controller' => 'basket',
		'action' => 'pay',
		'notAuthAccess' => false
	],
	'/personal/' => [
		'controller' => 'personal',
		'action' => 'index',
		'notAuthAccess' => false
	],
	'/signin/' => [
		'controller' => 'signin',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/signin/doAuth' => [
		'controller' => 'signin',
		'action' => 'doAuth',
		'notAuthAccess' => true
	],
	'/signup/' => [
		'controller' => 'signup',
		'action' => 'index',
		'notAuthAccess' => true
	],
	'/signup/doReg' => [
		'controller' => 'signup',
		'action' => 'doReg',
		'notAuthAccess' => true
	],
];