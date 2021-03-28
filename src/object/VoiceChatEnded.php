<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет служебное сообщение о голосовом чате, завершившемся в чате.
 */
class VoiceChatEnded extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('duration',     'int');   # Продолжительность голосового чата; в секундах.
	}



/**/
}
