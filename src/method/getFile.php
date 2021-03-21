<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class getFile extends _object_method {



	/** Подготовка данных сообщения */
	protected function set_method() {
		$this->command = 'getFile';
		$this->class_result = 'File';
	}



	public function file_id(String $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



/**/
}
