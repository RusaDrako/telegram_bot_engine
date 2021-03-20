<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 * Этот объект представляет собой ответ пользователя в неанонимном опросе.
 */
class PollAnswer extends _object_result {



	/** */
	function add_setting() {
		$this->set('poll_id',      'str');   # Уникальный идентификатор опроса
		$this->set_obj('user',     'User');   # Пользователь, изменивший ответ на опрос.
		$this->set('option_ids',   'def');   # Массив целых чисел, отсчитываемых от 0, для выбранных пользователем вариантов ответа. Может быть пустым, если пользователь отозвал свой голос.
	}



/**/
}
