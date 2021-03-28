<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет содержимое служебного сообщения, отправляемого всякий раз, когда пользователь в чате запускает оповещение о близости, установленное другим пользователем.
 */
class ProximityAlertTriggered extends _object_object {



	/** */
	protected function add_setting() {
		$this->set_obj('traveler',   'User');   # Пользователь, который вызвал оповещение
		$this->set_obj('watcher',    'User');   # Пользователь, который установил оповещение
		$this->set('distance',       'int');   # Расстояние между пользователями
	}




/**/
}
