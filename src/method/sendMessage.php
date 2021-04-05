<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class sendMessage extends send {



	/** Задаёт настройки объекта */
	protected function add_setting() {
		$this->command = 'sendMessage';
		parent::add_setting();
//		$this->class_result = 'Message';
//		$this->_add_required('chat_id');
		$this->set('text', 'str'); # Текст отправляемого сообщения, 1-4096 знаков после синтаксического анализа сущностей
		$this->_add_required('text');
		$this->set_var('parse_mode', ['Markdown', 'HTML']); # Режим разбора сущностей в тексте сообщения. Доступные значения: Markdown / HTML
		$this->set('disable_web_page_preview', 'bool'); # Отключает предварительный просмотр ссылок для ссылок в этом сообщении
	}



	/* * Текст отправляемого сообщения, 1-4096 знаков после синтаксического анализа сущностей * /
	public function text(String $value = null) {
		$strlen = \mb_strlen($value);
		if ($strlen < 1 || $strlen > 4096) {return $this;}

		$value = \mb_substr($value, 0, 4096);
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	/** Режим разбора сущностей в тексте сообщения. Доступные значения: Markdown / HTML * /
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


	/** Отключает предварительный просмотр ссылок для ссылок в этом сообщении  * /
	public function disable_web_page_preview(Bool $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



/**/
}
