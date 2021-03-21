<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class _object_method {

	use _trait__request;

	protected $bot = null;

	protected $post_data = [];

	protected $command = null;
	protected $class_result = null;
	protected $array_result = false;




	/** */
	final public function set_bot($bot) {
		$this->bot = $bot;
		return $this;
	}



	/** */
	protected function _get_post() {
		$result = [];
		foreach ($this->post_data as $k => $v) {
			if ($v === null) { continue;}
			$result[$k] = $v;
		}
		return $result;
	}



	/** Подготовка данных сообщения */
	protected function _add_post_data($name, $value) {
		if ($value === null) {
			unset($this->post_data[$name]);
		} else {
			$this->post_data[$name] = $value;
		}
	}



	/** Подготовка данных сообщения */
	final public function execute() {
		$this->set_method();
		$post = $this->_get_post();
		if ($this->array_result) {
			$result = $this->_request_arr($this->command, $this->class_result, $post);
		} else {
			$result = $this->_request_obj($this->command, $this->class_result, $post);
		}
//		$this->_info($result, __METHOD__);
		return $result;
	}



/**/
}
