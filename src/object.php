<?php

namespace RusaDrako\telegram_bot_engine;

/**
 *
 */
class object implements \JsonSerializable {

	protected $bot = null;
	private $_data = [];
	private $_data_filter = [];
	private $filter = [];
	private $is_obj = [];
	private $is_arr_obj = [];
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





	/** Формирует namespace для переданного имени класса
	 * @param String $obj_name Имя класса
	 */
	final protected function _namespace_object($obj_name) {
		# Формируем namespace объекта
		$arr_namespace = \explode('\\', \get_called_class());
		# Если нет первого обратного слэша - адрес относительный
		if ($obj_name[0] != '\\') {
			# Находим namespace текущего класса
			array_pop($arr_namespace);
			$str_namespace = \implode('\\', $arr_namespace);
			$obj_name = '\\' . $str_namespace . '\\' . $obj_name;
		}

		return $obj_name;
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





	/** Задаём свойство - объект
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_obj($name, $obj_name = null) {
		$this->_data[$name] = null;

//		$obj_name = $this->_namespace_object($obj_name);

		if (!is_array($obj_name)) {
			$obj_name = [$obj_name];
		}

		foreach ($obj_name as $k => $v) {
			$obj_name[$k] = $this->_namespace_object($v);
		}

		$this->is_obj[$name] = $obj_name;

		$this->_data_filter[$name] = function ($v) use ($obj_name, $name) {
			# Если имя класса есть в списке
			if (\in_array('\\' . \get_class($v), $this->is_obj[$name])) {return $v;}
			throw new \Exception("Неверный формат свойства \\" . \get_called_class() . "->{$name}. Должен быть объект: " . \implode(', ', $this->is_obj[$name]) . ". Передан: \\" . \get_class($v));
			return null;
		};
	}





	/** Задаём свойство - массив объектов
	 * @param String $name Имя свойства
	 * @param String $obj_name Класс объекта
	 */
	final protected function set_arr($name, $obj_name = null) {
		$this->_data[$name] = null;

		if (!is_array($obj_name)) {
			$obj_name = [$obj_name];
		}

		foreach ($obj_name as $k => $v) {
			$obj_name[$k] = $this->_namespace_object($v);
		}

		$this->is_arr_obj[$name] = $obj_name;

		$this->_data_filter[$name] = function ($val) use ($obj_name, $name) {
			if (!\is_array($val)) {
				throw new \Exception("Неверный формат свойства \\" . \get_called_class() . "->{$name}. Должен быть массив объектов: " . \implode(', ', $this->is_arr_obj[$name]));
				return null;
			}
			$control_name = $this->is_arr_obj[$name];
			# Проходим по элементам
			foreach ($val as $k => $v) {
				# Контроль наличия
				$control = false;
				# Если имя класса есть в списке
				if (\in_array('\\' . \get_class($v), $control_name)) {
					$control = true;
					continue;
				}
				# Если хотя бы один элемент не проходим проверку - ОШИБКА
				if (!$control) {
					$obj_error = $v;
					break;
				}
			}
			# Если всё нормально - возвращаем результат
			if ($control) {return $val;};
print_info($val);
			# Ошибка
			throw new \Exception("Неверный формат свойства " . \get_called_class() . "->{$name}. Элемент массива должен быть объектом: " . \implode(', ', $this->is_arr_obj[$name]) . ". Передан: \\" . \get_class($obj_error));
		};
	}





	/** Задаём свойство - массив массивов объектов
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





	/** Создаём объект */
	final private function _create_object($name, $data) {
		# Создаём класс
		$obj = (new $name())->set_bot($this->bot);
		# Загружаем данные
		$obj->set_data($data);
		# Возвращаем объект
		return $obj;
	}





	/** Присвоение массива свойств */
	final public function set_data($array) {
		foreach ($array as $k => $v) {
			# Если это массив объектов
			if (\array_key_exists($k, $this->is_arr_obj)) {
				$arr_v = [];
				# Проходим по массиву
				foreach ($v as $k_2 => $v_2) {
					# Берём первое имя в массиве
					$obj_name = $this->is_arr_obj[$k][0];
					# Создаём объект
					$arr_v[] = $this->_create_object($obj_name, $v_2);
				}
				$v = $arr_v;
			# Если это просто объект или значение
			} else {
				if (\array_key_exists($k, $this->is_obj)) {
					# Получаем имя объекта
					$obj_name = $this->is_obj[$k][0];
					# Создаём объект
					$v = $this->_create_object($obj_name, $v);
				}
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
		if (array_key_exists($name, $this->arr_arr)) {
			return $this->arr_arr[$name];
		}
		echo '<pre>';
		print_r($this->_data);
		print_r($this->arr_arr);
		throw new \Exception("Вызов неизвестного свойства объекта: \\" . \get_called_class() . "->{$name}");
	}





	/** */
	final public function __set($name, $value) {
		if (array_key_exists($name, $this->_data)) {
			# Если передан null в свойство
			if ($value === null) {
				# Просто обнуляем свойство
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
		if (array_key_exists($name, $this->arr_arr)) {
			if ($this->arr_arr[$name] === null) {
				$class_name = $this->arr_arr_name[$name];
			}
			foreach($value as $k => $v) {
				foreach($v as $k_2 => $v_2) {
					$obj = (new $class_name())->set_bot($this->bot);
					$obj->set_data($v_2);
					$this->arr_arr[$name][$k][$k_2] = $obj;
				}
			}
			return;
		}
		echo '<pre>';
		print_r($this->_data);
		print_r($this->arr_arr);
		throw new \Exception("Вызов неизвестного свойства объекта: \\" . \get_called_class() . "->{$name}");
	}





/**/
}
