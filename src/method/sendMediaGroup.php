<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class sendMediaGroup extends _send {



	/** Задаёт настройки объекта */
	protected function set_method() {
		$this->command = 'sendMediaGroup';
		parent::set_method();
		$this->_add_required('media');
	}



	/** Сериализованный в формате JSON массив, описывающий отправляемые сообщения, должен включать от 2 до 10 элементов.
	 * Array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo
	 */
	public function media($value = null) {
		if (!\is_a($value , 'InputMediaAudio')
			&& !\is_a($value , 'InputMediaDocument')
			&& !\is_a($value , 'InputMediaPhoto')
			&& !\is_a($value , 'InputMediaVideo') ) {return $this;}

		$this->_add_post_data_array(__FUNCTION__, $value);
		return $this;
	}



/**/
}
