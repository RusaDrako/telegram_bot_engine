<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой служебное сообщение об изменении настроек таймера автоудаления.
 */
class MessageAutoDeleteTimerChanged extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('message_auto_delete_time',     'int');   # Новое время автоматического удаления сообщений в чате.
	}



/**/
}
