<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой команду бота.
 */
class BotCommand extends _object_object {

	use _trait__file;



	/** */
	protected function add_setting() {
		$this->set('command',       'str');   # Текст команды, 1-32 символа. Может содержать только строчные английские буквы, цифры и символы подчеркивания.
		$this->set('description',   'str');   # Описание команды, 3–256 символов.
	}



/**/
}
