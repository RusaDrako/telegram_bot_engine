<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой уникальный идентификатор сообщения. 
 */
class MessageId extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('message_id',                'int');   # Уникальный идентификатор сообщения
	}



/**/
}
