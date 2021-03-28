<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Представляет место, к которому подключен чат.
 */
class ChatLocation extends _object_object {

	/** */
	protected function add_setting() {
		$this->set_obj('location',   'Location');   # Местоположение, к которому подключена супергруппа. Не может быть живым местом. 1e13
		$this->set('address',        'str');   # Адрес местонахождения; 1-64 символа, как определено владельцем чата
	}



/**/
}
