<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class _object_method extends \RusaDrako\telegram_bot_engine\object {

	use _trait__response;
/*
	protected $bot = null;

	protected $_data = [];
*/
	protected $command = null;
	protected $class_result = null;
	protected $array_result = false;

	protected $_required = [];
/*

	/** * /
	function __construct() {
		$this->filter['def'] = function ($v) {return $v;};
		$this->filter['int'] = function ($v) {return (int)$v;};
		$this->filter['float'] = function ($v) {return (float)$v;};
		$this->filter['str'] = function ($v) {return (String)$v;};
		$this->filter['bool'] = function ($v) {return (bool)$v;};
		$this->filter['date'] = function ($v) {return date('Y-m-d H:s:i', $v);};
		$this->filter['true'] = function ($v) {return true;};
//		$this->_info($this->filter);
		$this->add_setting();
	}



	/** Подготовка данных к var_dump() * /
	public function __debugInfo() {
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Задаёт данные, которые должны быть сериализованы в JSON * /
	public function jsonSerialize() {
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)* /
	protected function __preparationData($arr) {
//		$arr['bot'] =$this->bot;
/*		$arr = [
			$this->data,
			$this->obj,
			$this->arr,
		];/** /
//var_dump($this->_data);
		foreach ($this->_data as $k => $v) {
			if ($v === null) { continue; }
			$arr[$k] = $v;
		}
/*		if ($this->obj) {
			foreach ($this->obj as $k => $v) {
				if ($v === null) { continue; }
				$arr[$k] = $v;
			}
		}
		if ($this->arr) {
			foreach ($this->arr as $k => $v) {
				if ($v === null) { continue; }
				$arr[$k] = $v;
			}
		}
		if ($this->arr_arr) {
			foreach ($this->arr_arr as $k => $v) {
				if ($v === null) { continue; }
				$arr[$k] = $v;
			}
		}* /
		return $arr;
	}




	/** /
	public function met() {
		return get_class_methods($this);
	}


	/** * /
	final public function set_bot($bot) {
		$this->bot = $bot;
		return $this;
	}



	/** * /
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
		return true;
	}



	/* * Добавляет данные в запрос * /
	protected function _add_post_data($name, $value) {
		if ($value === null) {
			unset($this->post_data[$name]);
		} else {
			$this->post_data[$name] = $value;
		}
	}



	/** Добавляет данные в запрос * /
	protected function _add_post_data_array($name, $value) {
		if ($value !== null) {
			$this->post_data[$name][] = $value;
		}
	}



	/** Выполняет запрос */
	final public function execute() {
//		$this->set_method();
		$post = $this->__preparationData([]);
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
//	protected function set_method() {}

/**/
}
