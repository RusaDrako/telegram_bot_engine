<?php

if (class_exists('RD_TBE_Bot', false)) {
	return;
}

$classMap = [
	'RusaDrako\\telegram_bot_engine\\telegram_bot'       => 'RD_TBE_Bot',
];

foreach ($classMap as $class => $alias) {
	class_alias($class, $alias);
}
