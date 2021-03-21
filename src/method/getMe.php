<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 * 
 */
class getMe extends _object_method {



	/** Подготовка данных сообщения */
	protected function set_method() {
		$this->command = 'getMe';
		$this->class_result = 'User';
		$this->array_result = false;
	}



/**/
}
