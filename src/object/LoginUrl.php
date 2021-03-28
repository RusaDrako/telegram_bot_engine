<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет параметр встроенной кнопки клавиатуры, используемой для автоматической авторизации пользователя. Служит отличной заменой виджета входа в Telegram, когда пользователь переходит из Telegram. Все, что нужно сделать пользователю, это нажать / щелкнуть кнопку и подтвердить, что он хочет войти в систему. Приложения Telegram поддерживают эти кнопки начиная с версии 5.7. Пример бота: @discussbot
 */
class LoginUrl extends _object_object {

	use _trait__file;



	/** */
	protected function add_setting() {
		$this->set('url',            'str');   # URL-адрес HTTP, который должен быть открыт с данными авторизации пользователя, добавленными в строку запроса при нажатии кнопки. Если пользователь отказывается предоставить данные авторизации, будет открыт исходный URL без информации о пользователе. Добавляемые данные такие же, как описано в разделе «Получение данных авторизации». ПРИМЕЧАНИЕ. Вы всегда должны проверять хэш полученных данных для проверки аутентификации и целостности данных, как описано в разделе «Проверка авторизации».
		$this->set('forward_text',   'str');   # Опционально. Новый текст кнопки в пересылаемых сообщениях.
		$this->set('bot_username',   'str');   # Опционально. Логин бота, который будет использоваться для авторизации пользователя. См. Дополнительные сведения в разделе «Настройка бота». Если не указано, будет использоваться имя текущего бота. Домен URL-адреса должен быть таким же, как и домен, связанный с ботом. Дополнительные сведения см. В разделе «Связывание домена с ботом».
		$this->set('request_write_access',   'bool');   # Опционально. Передайте значение True, чтобы запросить у вашего бота разрешение на отправку сообщений пользователю.
	}



/**/
}
