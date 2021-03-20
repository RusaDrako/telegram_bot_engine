<?php

namespace RusaDrako\telegram_bot_engine\msg;



$class_map = [
	'_object_msg.php',
//	'trait__info.php',
	'msg.php',
	'keyboard.php',
	'keyboard_line.php',
	'keyboard_button.php',
];


foreach ($class_map as $k => $v) {
	require_once(__DIR__ . '/' . $v);
}

//require_once(__DIR__ . '/aliases.php');
