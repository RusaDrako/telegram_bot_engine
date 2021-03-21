<?php

namespace RusaDrako\telegram_bot_engine\method;



$class_map = [
	'_trait__request.php',
	'_object_method.php',
//	'method.php',
	'getFile.php',
	'getMe.php',
	'getUpdates.php',
];


foreach ($class_map as $k => $v) {
	require_once(__DIR__ . '/' . $v);
}

//require_once(__DIR__ . '/aliases.php');
