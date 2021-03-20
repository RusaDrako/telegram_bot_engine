<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 * Этот объект содержит информацию об одном варианте ответа в опросе.
 */
class result extends _object_result {



	/** */
	function add_setting() {
		$this->set('ok',              'bool');   # Запрос удачный
		$this->set('error_code',      'int');   # Опционально. Код ошибки
		$this->set('description',     'str');   # Опционально. Описание ошибки
//		$this->result_type_arr('result',  'Message');   # Результат запроса
	}





	/** */
	public function result_type_obj($type = 'User') {
		$this->set_obj('result',  $type);   # Результат запроса
		return $this;
	}





	/** */
	public function result_type_arr($type = 'Message') {
		$this->set_arr('result',  $type);   # Результат запроса
		return $this;
	}



/**/
}
