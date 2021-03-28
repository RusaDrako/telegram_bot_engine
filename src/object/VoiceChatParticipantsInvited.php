<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет служебное сообщение о новых участниках, приглашенных в голосовой чат.
 */
class VoiceChatParticipantsInvited extends _object_object {



	/** */
	protected function add_setting() {
		$this->set_arr('users',     'User');   # Опционально. Новые участники, приглашенные в голосовой чат.
	}



/**/
}
