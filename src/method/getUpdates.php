<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class getUpdates extends _object_method {



	/** Задаёт настройки объекта */
	protected function add_setting() {
		$this->command = 'getUpdates';
		$this->class_result = 'Update';
		$this->array_result = true;
		$this->set('offset',    'int');
		$this->set('limit',     'int');
		$this->set('timeout',   'int');
	}


/*
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


/**/
}
