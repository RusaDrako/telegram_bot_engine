<?php

namespace RusaDrako\telegram_bot_engine;

/**
 *
 */
class object implements \JsonSerializable {

	protected $bot = null;
	private $_data = [];
	private $_data_filter = [];
//	private $_data_var = [];
//	private $_data_var_filter = [];
	private $filter = [];
	private $is_obj = [];
	private $arr = [];
	private $arr_name = [];
	private $arr_arr = [];
	private $arr_arr_name = [];





	/** Конструктор объекта */
	function __construct() {
		# Задаём филтьтры
		$this->filter['def']     = function ($v) {return $v;};
		$this->filter['int']     = function ($v) {return (int)$v;};
		$this->filter['float']   = function ($v) {return (float)$v;};
		$this->filter['str']     = function ($v) {return (String)$v;};
		$this->filter['bool']    = function ($v) {return (bool)$v;};
		$this->filter['date']    = function ($v) {return date('Y-m-d H:s:i', $v);};
		$this->filter['true']    = function ($v) {return true;};
		# Добавляем настройки
		$this->add_setting();
	}



	/** Задаём объект бота */
//--	final public function set_bot(\RusaDrako\telegram_bot_engine\telegram_bot $bot) {
	final public function set_bot($bot) {
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
		$this->_data[$name] = null;

		$this->_data_filter[$name] = function ($v) use ($filter) {
			if (\in_array($v, $filter)) {return $v;}
			return null;
		};
	}





	/** Формирует namespace для переданного имени класса
	 * @param String $obj_name Имя класса
	 */
	final protected function _namespace_object($obj_name) {
		# Формируем namespace объекта
		$arr_namespace = \explode('\\', \get_called_class());
		# Если нет первого обратного слэша - адрес относительный
		if ($arr_namespace[0] != '') {
			# Находим namespace текущего класса
			array_pop($arr_namespace);
			$str_namespace = \implode('\\', $arr_namespace);
			$obj_name = $str_namespace . '\\' . $obj_name;
		}

		return $obj_name;
	}





	/** Задаём свойство - объект
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_obj($name, $obj_name = null) {
		$this->_data[$name] = null;

		$obj_name = $this->_namespace_object($obj_name);

		$this->is_obj[$name] = $obj_name;

		$this->_data_filter[$name] = function ($v) use ($obj_name) {
			if (\is_a($v, $obj_name)) {return $v;}
			return null;
		};
	}





	/** Задаём свойство - массив
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_arr($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$this->arr[$name] = null;
		$this->arr_name[$name] = $this->_namespace_object($obj_name);
	}





	/** Задаём свойство - массив массивов
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_arr_arr($name, $obj_name = null) {
		if($obj_name === null) {
			$obj_name = $name;
		}
		$this->arr_arr[$name] = null;
		$this->arr_arr_name[$name] = $this->_namespace_object($obj_name);
	}





	/** Присвоение массива свойств */
	final public function set_data($array) {
		foreach ($array as $k => $v) {
			# Если это должен быть объект
			if (\array_key_exists($k, $this->is_obj)) {
				$obj_name = $this->is_obj[$k];
				$obj = new $obj_name();
				$obj->set_data($v);
				$v = $obj;
			}
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
		foreach ($this->_data as $k => $v) {
			if (!$full && $v === null) { continue; }
			$arr[$k] = $v;
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
		if (array_key_exists($name, $this->arr)) {
			return $this->arr[$name];
		}
		if (array_key_exists($name, $this->arr_arr)) {
			return $this->arr_arr[$name];
		}
		echo '<pre>';
		print_r($this->_data);
		print_r($this->_data_var);
		print_r($this->arr);
		throw new \Exception("Вызов неизвестного свойства объекта: " . \get_called_class() . "->{$name}");
	}





	/** */
	final public function __set($name, $value) {
		if (array_key_exists($name, $this->_data)) {
			if ($value === null) {
				$this->_data[$name] = null;
				return;
			}
			# Фильтр
			$filter_name = $this->_data_filter[$name];
			# Если это функция
			if (\is_callable($filter_name)) {
				$filter = $filter_name;
			# Иначе строка
			} else {
				$filter = $this->filter[$filter_name];
			}
			$this->_data[$name] = $filter($value);
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
		print_r($this->arr);
//		print_r($this->arr_name);/**/
		throw new \Exception("Вызов неизвестного свойства объекта: " . \get_called_class() . "->{$name}");
	}





/**/
}
