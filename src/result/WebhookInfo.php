<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 * Этот объект представляет бота или пользователя Telegram.
 */
class WebhookInfo extends _object_result {



	/** https://core.telegram.org/bots/api#chat */
	protected function add_setting() {
		$this->set('url',                      'str');    # URL-адрес веб-перехватчика, может быть пустым, если веб-перехватчик не настроен
		$this->set('has_custom_certificate',   'bool');   # True, если для проверки сертификата веб-перехватчика был предоставлен настраиваемый сертификат
		$this->set('pending_update_count',     'int');    # Целое число Количество обновлений, ожидающих доставки
		$this->set('ip_address',               'int');    # Опционально. Текущий IP-адрес веб-перехватчика
		$this->set('last_error_date',          'date');    # Опционально. Время Unix для самой последней ошибки, которая произошла при попытке доставить обновление через веб-перехватчик
		$this->set('last_error_message',       'str');    # Опционально. Сообщение об ошибке в удобочитаемом формате для самой последней ошибки, которая произошла при попытке доставить обновление через веб-перехватчик
		$this->set('max_connections',          'int');   # Опционально. Максимально допустимое количество одновременных HTTPS-подключений к веб-перехватчику для доставки обновлений
		$this->set('allowed_updates',          'def');   # Опционально. Список типов обновлений, на которые подписан бот. По умолчанию для всех типов обновлений, кроме chat_member
	}



/**/
}
