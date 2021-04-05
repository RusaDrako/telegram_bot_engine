<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class getMe extends _object_method {



	/** Задаёт настройки объекта */
	protected function add_setting() {
		$this->command = 'getMe';
		$this->class_result = 'User';
	}



/**/
}
