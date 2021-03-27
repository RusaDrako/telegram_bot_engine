<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет контакт с номером телефона.
 */
class Contact extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('phone_number',   'str');   # Телефон контакта
		$this->set('first_name',     'str');   # Имя контакта
		$this->set('last_name',      'str');   # Опционально. Фамилия контакта
		$this->set('user_id',        'int');   # Опционально. Идентификатор пользователя контакта в Telegram
		$this->set('vcard',          'str');   # Опционально. Дополнительные данные о контакте в виде vCard
	}



/**/
}
