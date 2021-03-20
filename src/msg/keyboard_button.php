<?php

namespace RusaDrako\telegram_bot_engine\msg;

/**
 * Объект кнопки клавиатуры
 */
class keyboard_button extends _object_msg {

	protected $data = [];


	/** Кнопка ссылки */
	public function url($caption, $url) {
		$this->data = [
			"text" => $caption,
			"url" => $url,
		];
	}



	/** */
	public function callback($caption, $callback) {
		$this->data = [
			"text" => $caption,
			"callback_data" => $callback,
		];
	}



/**/
}
