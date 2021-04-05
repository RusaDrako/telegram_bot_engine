<?php

namespace RusaDrako\telegram_bot_engine;



$class_map = [
	'telegram_bot.php',
	'object.php',
	'object/_autoload.php',
	'method/_autoload.php',
];


foreach ($class_map as $k => $v) {
	require_once(__DIR__ . '/' . $v);
}

require_once(__DIR__ . '/aliases.php');
