<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class getUpdates extends _object_method {



	/** Задаёт настройки объекта */
	protected function set_method() {
		$this->command = 'getUpdates';
		$this->class_result = 'Update';
		$this->array_result = true;
	}



	public function offset(int $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	public function limit(int $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



	public function timeout(int $value = null) {
		$this->_add_post_data(__FUNCTION__, $value);
		return $this;
	}



/**/
}
