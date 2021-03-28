<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет изменения в статусе участника чата.
 */
class ChatMemberUpdated extends _object_object {

	/** */
	protected function add_setting() {
		$this->set_obj('chat',   'Chat');   # Чат, к которому принадлежит пользователь
		$this->set_obj('from',   'User');   # Исполнитель действия, в результате которого произошла смена
		$this->set('date',       'date');   # Дата, когда было произведено изменение во времени Unix
		$this->set_obj('old_chat_member',   'ChatMember');   # Предыдущая информация об участнике чата
		$this->set_obj('new_chat_member',   'ChatMember');   # Новая информация об участнике чата
		$this->set_obj('invite_link',       'ChatInviteLink');   # Опционально. Ссылка для приглашения в чат, которая использовалась пользователем для присоединения к чату; только для присоединения по инвайт-ссылкам.
	}



/**/
}
