<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Представляет ссылку для приглашения в чат.
 */
class ChatInviteLink extends _object_object {

	/** */
	protected function add_setting() {
		$this->set('invit_link',     'str');   # Ссылка для приглашения. Если ссылка была создана другим администратором чата, то вторая часть ссылки будет заменена на «…».
		$this->set_obj('creator',    'User');   # Пользователь Создатель ссылки
		$this->set('is_primary',     'bool');   # True, если ссылка первичная
		$this->set('is_revoked',     'bool');   # True, если ссылка отозвана
		$this->set('expire_date',    'int');   # Опционально. Момент времени (временная метка Unix), когда срок действия ссылки истечет или истек
		$this->set('member_limit',   'int');   # Опционально. Максимальное количество пользователей, которые могут быть участниками чата одновременно после присоединения к чату по этой пригласительной ссылке; 1-99999
	}



/**/
}
