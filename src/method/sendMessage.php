<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class sendMessage extends _send {



	/** Задаёт настройки объекта */
	protected function set_method() {
		$this->command = 'sendMessage';
		parent::set_method();
//		$this->class_result = 'Message';
//		$this->_add_required('chat_id');
		$this->_add_required('text');
	}



	/** Текст отправляемого сообщения, 1-4096 знаков после синтаксического анализа сущностей */
	public function text(String $value = null) {
		$strlen = \mb_strlen($value);
		if ($strlen < 1 || $strlen > 4096) {return $this;}

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



	/** Список специальных сущностей, которые появляются в тексте сообщения, которые можно указать вместо parse_mode * /
	public function entities(array $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}


	/** Отключает предварительный просмотр ссылок для ссылок в этом сообщении  */
	public function disable_web_page_preview(Bool $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



/**/
}
