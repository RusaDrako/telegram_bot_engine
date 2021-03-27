<?php

namespace RusaDrako\telegram_bot_engine\object;



/** Загружает все файлы из текущей папки и подпапок, кроме указанных в ограничении */
function autoload($dir, array $exclusion = []) {
	$exclusion = array_merge([".",".."], $exclusion);
	$result = [];
	$cdir = scandir($dir);
	foreach ($cdir as $key => $value) {
		if (!in_array($value, $exclusion)) {
			# Если есть маркер "удалённого" элемент
			if (mb_substr($value, 0, 3) == '___') {
				continue;
			}
			# Если это директория
			if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
				$result[$value] = autoload($dir . DIRECTORY_SEPARATOR . $value);
			# Грузим только '*.php'
			} elseif (substr($value, -4, 4) == '.php') {
				require_once($dir . DIRECTORY_SEPARATOR . $value);
				$result[] = $value;
			}
		}
	}
	return $result;
}

# Эти файлы загружаем первыми
require_once(__DIR__ .'/_trait__file.php');
require_once(__DIR__ . '/_object_object.php');

# Автозагрузчик
autoload(__DIR__);
