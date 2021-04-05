<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class send extends _object_method {


	/** Задаёт настройки объекта */
	protected function add_setting() {
//		$this->command = 'sendMessage';
		$this->class_result = 'Message';
		$this->set('chat_id', 'int'); # Уникальный идентификатор целевого чата или имя пользователя целевого канала (в формате @channelusername)
		$this->_add_required('chat_id');
		$this->set('disable_notification', 'bool'); # Отправляет сообщение беззвучно. Пользователи получат уведомление без звука.
		$this->set('reply_to_message_id', 'int'); # Если сообщение является ответом, идентификатор исходного сообщения
		$this->set('allow_sending_without_reply', 'bool'); # True, если сообщение должно быть отправлено, даже если указанное сообщение, на которое был дан ответ, не найдено
		$this->set('reply_markup', 'str'); /** Дополнительные возможности интерфейса. JSON-сериализованный объект для встроенной клавиатуры, настраиваемой клавиатуры ответа, инструкций по удалению клавиатуры ответа или принудительного ответа от пользователя.
		 * InlineKeyboardMarkup or ReplyKeyboardMarkup or ReplyKeyboardRemove or ForceReply
		*/
	}



	/* * Уникальный идентификатор целевого чата или имя пользователя целевого канала (в формате @channelusername) * /
	public function chat_id(int $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/** Отправляет сообщение беззвучно. Пользователи получат уведомление без звука.  * /
	public function disable_notification(Bool $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/** Если сообщение является ответом, идентификатор исходного сообщения  * /
	public function reply_to_message_id(int $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/** True, если сообщение должно быть отправлено, даже если указанное сообщение, на которое был дан ответ, не найдено  * /
	public function allow_sending_without_reply(Bool $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}




	public function reply_markup(int $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



/**/
}
