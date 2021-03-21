<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class sendPhoto extends _send {



	/** Задаёт настройки объекта */
	protected function set_method() {
		$this->command = 'sendPhoto';
		parent::set_method();
//		$this->class_result = 'Message';
//		$this->_add_required('chat_id');
		$this->_add_required('photo');

	}



	/** Фото для отправки. Передайте file_id как String, чтобы отправить фотографию, которая существует на серверах Telegram (рекомендуется), передайте URL-адрес HTTP как String для Telegram, чтобы получить фотографию из Интернета, или загрузите новую фотографию с помощью multipart / form-data. Размер фотографии не должен превышать 10 МБ. Общая ширина и высота фото не должны превышать 10000. Соотношение ширины и высоты должно быть не более 20.  */
	public function photo(String $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/** Подпись к фотографии (также может использоваться при повторной отправке фотографий по file_id), 0-1024 символа после синтаксического анализа сущностей */
	public function caption(String $value = null) {
		$strlen = \mb_strlen($value);
		if ($strlen < 1 || $strlen > 1024) {return $this;}

		$value = \mb_substr($value, 0, 4096);
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/** Режим разбора сущностей в тексте сообщения. Доступные значения: Markdown / HTML */
	public function parse_mode(String $value = null) {
		if (!\in_array($value, ['Markdown', 'HTML'])) {return $this;}

		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/* * Список особых сущностей, которые появляются в заголовке, которые можно указать вместо parse_mode * /
	public function caption_entities(array $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



/**/
}
