<?php

namespace RusaDrako\telegram_bot_engine;

/**
 *
 */
class object implements \JsonSerializable {

	protected $bot = null;
	private $_data = [];
	private $_data_filter = [];
	private $_data_var = [];
	private $_data_var_filter = [];
	private $filter = [];
	private $obj = [];
	private $obj_name = [];
	private $arr = [];
	private $arr_name = [];
	private $arr_arr = [];
	private $arr_arr_name = [];





	/** Конструктор объекта */
	function __construct() {
		# Задаём филтьтры
		$this->filter['def'] = function ($v) {return $v;};
		$this->filter['int'] = function ($v) {return (int)$v;};
		$this->filter['float'] = function ($v) {return (float)$v;};
		$this->filter['str'] = function ($v) {return (String)$v;};
		$this->filter['bool'] = function ($v) {return (bool)$v;};
		$this->filter['date'] = function ($v) {return date('Y-m-d H:s:i', $v);};
		$this->filter['true'] = function ($v) {return true;};
		# Добавляем настройки
		$this->add_setting();
	}



	/** Задаём объект бота */
	final public function set_bot(\RusaDrako\telegram_bot_engine\telegram_bot $bot) {
		$this->bot = $bot;
		return $this;
	}



	/** Задаём свойство с типовым фильтром
	 * @param String $name Имя свойства
	 * @param String $filter Имя фильтра
	 */
	final protected function set($name, $filter = 'def') {
		$this->_data[$name] = null;
		$this->_data_filter[$name] = $filter;
	}





	/** Задаём свойство с заданным массивом значений
	 * @param String $name Имя свойства
	 * @param String $filter Имя фильтра
	 */
	final protected function set_var($name, array $filter = []) {
		$this->_data_var[$name] = null;
		$this->_data_var_filter[$name] = $filter;
	}





	/** Задаём свойство - объект
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_obj($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$obj_name = __NAMESPACE__ . '\\object\\' . $obj_name;
		$this->obj[$name] = null;
		$this->obj_name[$name] = $obj_name;
	}





	/** Задаём свойство - массив
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_arr($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$obj_name = __NAMESPACE__ . '\\object\\' . $obj_name;
		$this->arr[$name] = null;
		$this->arr_name[$name] = $obj_name;
	}





	/** Задаём свойство - массив массивов
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_arr_arr($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$obj_name = __NAMESPACE__ . '\\object\\' . $obj_name;
		$this->arr_arr[$name] = null;
		$this->arr_arr_name[$name] = $obj_name;
	}





	/** Присвоение массива свойств */
	final public function set_data($array) {
		foreach ($array as $k => $v) {
			$this->$k = $v;
		}
	}





	/** Подготовка данных к var_dump() */
	public function __debugInfo() {
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Задаёт данные, которые должны быть сериализованы в JSON */
	public function jsonSerialize() {
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Задаёт данные, которые должны быть сериализованы в JSON */
	public function existsProp() {
		$arr = $this->__preparationData([], true);
		return $arr;
	}





	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)*/
	protected function __preparationData($arr, $full = false) {
//		$arr['bot'] =$this->bot;
/*		$arr = [
			$this->data,
			$this->obj,
			$this->arr,
		];/**/
//var_dump($this->_data);
		foreach ($this->_data as $k => $v) {
			if (!$full && $v === null) { continue; }
			$arr[$k] = $v;
		}
		foreach ($this->_data_var as $k => $v) {
			if (!$full && $v === null) { continue; }
			$arr[$k] = $v;
		}
		if ($this->obj) {
			foreach ($this->obj as $k => $v) {
				if (!$full && $v === null) { continue; }
				$arr[$k] = $v;
			}
		}
		if ($this->arr) {
			foreach ($this->arr as $k => $v) {
				if (!$full && $v === null) { continue; }
				$arr[$k] = $v;
			}
		}
		if ($this->arr_arr) {
			foreach ($this->arr_arr as $k => $v) {
				if (!$full && $v === null) { continue; }
				$arr[$k] = $v;
			}
		}
		return $arr;
	}





	/** */
	final public function __get($name) {
		if (array_key_exists($name, $this->_data)) {
			return $this->_data[$name];
		}
		if (array_key_exists($name, $this->_data_var)) {
			return $this->_data_var[$name];
		}
		if (array_key_exists($name, $this->obj)) {
			return $this->obj[$name];
		}
		if (array_key_exists($name, $this->arr)) {
			return $this->arr[$name];
		}
		if (array_key_exists($name, $this->arr_arr)) {
			return $this->arr_arr[$name];
		}
		echo '<pre>';
		print_r($this->_data);
		print_r($this->_data_var);
		print_r($this->obj);
//		print_r($this->obj_name);
		print_r($this->arr);
//		print_r($this->arr_name);
		throw new \Exception("Вызов неизвестного свойства объекта: " . \get_called_class() . "->{$name}");
	}





	/** */
	final public function __set($name, $value) {
		if (array_key_exists($name, $this->_data)) {
//			$value = $this->filter($name, $value);
//			print_r($name);
//			print_r($value);
//			print_r($this->_data_filter[$name]);
//			print_r($this->filter);
			$filter_name = $this->_data_filter[$name];
			$filter = $this->filter[$filter_name];
//echo \get_called_class() . ' - ';
//echo $name . ' - ';
//var_dump($value);
//echo '<br>';
			$this->_data[$name] = $filter($value);
			return;
		}
		if (array_key_exists($name, $this->_data_var)) {
			if (\array_key_exists($value, $this->_data_var_filter[$name])) {
				$this->_data_var[$name] = $filter($value);
			} else {
				$this->_data_var[$name] = NULL;
			}
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
		if (array_key_exists($name, $this->arr_arr)) {
			if ($this->arr_arr[$name] === null) {
				$class_name = $this->arr_arr_name[$name];
			}
//print_info($this->arr_arr_name[$name], '$name');
			foreach($value as $k => $v) {
				foreach($v as $k_2 => $v_2) {
					$obj = (new $class_name())->set_bot($this->bot);
	//				$obj->set_bot($this->bot);
					$obj->set_data($v_2);
					$this->arr_arr[$name][$k][$k_2] = $obj;
				}
			}
			return;
		}
		echo '<pre>';
		print_r($this->_data);
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
