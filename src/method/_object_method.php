<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class _object_method {

	use _trait__response;

	protected $bot = null;

	protected $post_data = [];

	protected $command = null;
	protected $class_result = null;
	protected $array_result = false;

	protected $_required = [];




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



	/** Задаёт обязательный параметр запроса */
	protected function _add_required($name) {
		$this->_required[$name] = $name;
	}



	/** Проверяет обязательные параметры запроса */
	protected function _control_required($post) {
		foreach ($this->_required as $k => $v) {
			if (!isset($post[$k])) {
				return false;
			}
		}
var_dump($this->_required);
var_dump($post);
		return true;
	}



	/** Добавляет данные в запрос */
	protected function _add_post_data($name, $value) {
		if ($value === null) {
			unset($this->post_data[$name]);
		} else {
			$this->post_data[$name] = $value;
		}
	}



	/** Добавляет данные в запрос */
	protected function _add_post_data_array($name, $value) {
		if ($value !== null) {
			$this->post_data[$name][] = $value;
		}
	}



	/** Выполняет запрос */
	final public function execute() {
		$this->set_method();
		$post = $this->_get_post();
		if (!$this->_control_required($post)) {
			echo '<pre>';
			print_r($post);
			echo '<hr>';
			print_r($this->_required);
			throw new \Exception("Заданы не все необходимые параметры запроса: " . \get_called_class() . "->{$name}");
		}
		if ($this->array_result) {
			$result = $this->_request_arr($this->command, $this->class_result, $post);
		} else {
			$result = $this->_request_obj($this->command, $this->class_result, $post);
		}
		return $result;
	}


	/** Задаёт настройки объекта */
	protected function set_method() {}

/**/
}
