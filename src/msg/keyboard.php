<?php

namespace RusaDrako\telegram_bot_engine\msg;

/**
 * Объект клавиатуры
 */
class keyboard extends _object_msg {

	protected $data = [];
	protected $type = 'inline_keyboard';



	/** Возвращает объект строки клавиатуры */
	function line() {
		$obj = new keyboard_line();
		$this->data[] = $obj;
		return $obj;
	}



	/** Возвращает тип клавиатуры */
	public function getType() {
		return $this->type;
	}



	/** Устанавливает тип клавиатуры - инлайн */
	public function setInline() {
		$this->type = 'inline_keyboard';
		return $this;
	}



	/** Устанавливает тип клавиатуры - клавиатура */
	public function setKeyboard() {
		$this->type = 'keyboard';
		return $this;
	}



/**/
}
