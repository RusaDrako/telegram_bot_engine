<?php

if (class_exists('RD_TBE_Api', false)) {
	return;
}

$classMap = [
	'RusaDrako\\telegram_bot_engine\\telegram_bot'       => 'RD_TBE_Api',
];

foreach ($classMap as $class => $alias) {
	class_alias($class, $alias);
}
