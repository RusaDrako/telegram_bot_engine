<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 *
 */
class _object_result {

	protected $bot = null;
	private $data = [];
	private $data_filter = [];
	private $filter = [];
	private $obj = [];
	private $obj_name = [];
	private $arr = [];
	private $arr_name = [];





	/** */
	function __construct() {
		$this->filter['def'] = function ($v) {return $v;};
		$this->filter['int'] = function ($v) {return (int)$v;};
		$this->filter['float'] = function ($v) {return (float)$v;};
		$this->filter['str'] = function ($v) {return (String)$v;};
		$this->filter['bool'] = function ($v) {return (bool)$v;};
		$this->filter['date'] = function ($v) {return date('Y-m-d H:s:i', $v);};
//		$this->_info($this->filter);
		$this->add_setting();
	}


	/** */
	final public function set_bot($bot) {
		$this->bot = $bot;
		return $this;
	}



	/** */
	final protected function set($name, $filter = 'def') {
		$this->data[$name] = null;
		$this->data_filter[$name] = $filter;
	}





	/** */
	final protected function set_obj($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$obj_name = __NAMESPACE__ . '\\' . $obj_name;
		$this->obj[$name] = null;
		$this->obj_name[$name] = $obj_name;
	}





	/** */
	final protected function set_arr($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$obj_name = __NAMESPACE__ . '\\' . $obj_name;
		$this->arr[$name] = null;
		$this->arr_name[$name] = $obj_name;
	}





	/** */
	final public function set_data($array) {
//		$this->_info($array);
		foreach ($array as $k => $v) {
			$this->$k = $v;
		}
	}





	/** Подготовка данных к var_dump() */
	public function __debugInfo() {
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)*/
	protected function __preparationData($arr) {
//		$arr['bot'] =$this->bot;
/*		$arr = [
			$this->data,
			$this->obj,
			$this->arr,
		];/**/
		foreach ($this->data as $k => $v) {
			if ($v === null) { continue; }
			$arr[$k] = $v;
		}
		if ($this->obj) {
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
		return $arr;
	}





	/** */
	final public function __get($name) {
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		}
		if (array_key_exists($name, $this->obj)) {
			return $this->obj[$name];
		}
		if (array_key_exists($name, $this->arr)) {
			return $this->arr[$name];
		}
		echo '<pre>';
		print_r($this->data);
		print_r($this->obj);
//		print_r($this->obj_name);
		print_r($this->arr);
//		print_r($this->arr_name);
		throw new \Exception("Вызов неизвестного свойства объекта: " . \get_called_class() . "->{$name}");
	}





	/** */
	final public function __set($name, $value) {
		if (array_key_exists($name, $this->data)) {
//			$value = $this->filter($name, $value);
//			print_r($name);
//			print_r($value);
//			print_r($this->data_filter[$name]);
//			print_r($this->filter);
			$filter_name = $this->data_filter[$name];
			$filter = $this->filter[$filter_name];
			$this->data[$name] = $filter($value);
			return;
		}
		if (array_key_exists($name, $this->obj)) {
			$obj = $this->obj[$name];
			if ($obj === null) {
				$class_name = $this->obj_name[$name];
				$this->obj[$name] = (new $class_name())->set_bot($this->bot);
//				$this->obj[$name]->set_bot($this->bot);
			}
			$this->obj[$name]->set_data($value);
			return;
		}
		if (array_key_exists($name, $this->arr)) {
			if ($this->arr[$name] === null) {
				$class_name = $this->arr_name[$name];
			}
			foreach($value as $k => $v) {
				$obj = (new $class_name())->set_bot($this->bot);
//				$obj->set_bot($this->bot);
				$obj->set_data($v);
				$this->arr[$name][] = $obj;
			}
			return;
		}
		echo '<pre>';
		print_r($this->data);
		print_r($this->obj);
//		print_r($this->obj_name);
		print_r($this->arr);
//		print_r($this->arr_name);/**/
		throw new \Exception("Вызов неизвестного свойства объекта: " . \get_called_class() . "->{$name}");
	}





	/** Фильтр информации */
	protected function filter($name, $value) {
		return $value;
	}





/**/
}
