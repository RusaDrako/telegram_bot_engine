<?php

namespace RusaDrako\telegram_bot_engine\msg;

/**
 * Объект строки клавиатуры
 */
class keyboard_line extends _object_msg {

	protected $data = [];



	/** Возвращает объект кнопки */
	function button() {
		$obj = new keyboard_button();
		$this->data[] = $obj;
		return $obj;
	}



/**/
}
