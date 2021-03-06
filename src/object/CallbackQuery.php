<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой одну особую сущность в текстовом сообщении. Например, хэштеги, имена пользователей, URL-адреса и т.д.
 */
class CallbackQuery extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('id',                'str');   # Уникальный идентификатор для этого запроса
		$this->set_obj('from',          'User');   # Отправитель
		$this->set_obj('message',       'Message');   # Опционально. Сообщение с кнопкой обратного вызова, которая инициировала запрос. Обратите внимание, что содержание сообщения и дата сообщения будут недоступны, если сообщение слишком старое.
		$this->set('inline_message_id', 'str');   # Опционально. Идентификатор сообщения, отправленного через бот во встроенном режиме, которое отправило запрос.
		$this->set('chat_instance',     'str');   # Опционально. Глобальный идентификатор, однозначно соответствующий чату, в который было отправлено сообщение с кнопкой обратного вызова. Полезно для высоких результатов в играх.
		$this->set('data',              'str');   # Опционально.  Данные, связанные с кнопкой обратного вызова. Имейте в виду, что плохой клиент может отправлять произвольные данные в это поле.
		$this->set('game_short_name',   'str');   # Опционально. Краткое название игры, которое должно быть возвращено, служит уникальным идентификатором игры.
	}



/**/
}
