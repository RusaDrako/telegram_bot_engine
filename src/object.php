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
	private $is_arr_arr_obj = [];

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
	 * @param string $class_name Имя класса
	 */
	final protected function _namespace_object($class_name) {
		# Формируем namespace объекта
		$arr_namespace = \explode('\\', \get_called_class());
		# Если нет первого обратного слэша - адрес относительный
		if ($class_name[0] != '\\') {
			# Находим namespace текущего класса
			array_pop($arr_namespace);
			$str_namespace = \implode('\\', $arr_namespace);
			$class_name = '\\' . $str_namespace . '\\' . $class_name;
		}

		return $class_name;
	}





	/** Задаём свойство с типовым фильтром
	 * @param string $name Имя свойства
	 * @param string $filter Имя фильтра
	 */
	final protected function set($name, $filter = 'def') {
		$this->_data[$name] = null;
		# Фильтр
		$this->_data_filter[$name] = $filter;
	}





	/** Задаём свойство с заданным массивом значений
	 * @param string $name Имя свойства
	 * @param string $filter Имя фильтра
	 */
	final protected function set_var($name, array $filter = []) {
		$this->_data[$name] = null;
		# Фильтр
		$this->_data_filter[$name] = function ($v) use ($filter, $name) {
			if (\in_array($v, $filter)) {return $v;}
			# Ошибонька
			throw new \Exception("Неверное значение свойства \\" . \get_called_class() . "->{$name}. Должено быть одно из следующих значений: " . \implode(', ', $filter) . ". Передано: " . $v);
		};
	}





	/** Задаём свойство - объект
	 * @param string $name Имя свойства
	 * @param string $class_name Класс объекта
	 */
	final protected function set_obj($name, $class_name = null) {
		$this->_data[$name] = null;

		if (!is_array($class_name)) {
			$class_name = [$class_name];
		}

		foreach ($class_name as $k => $v) {
			$class_name[$k] = $this->_namespace_object($v);
		}

		$this->is_obj[$name] = $class_name;
		# Фильтр
		$this->_data_filter[$name] = function ($v) use ($class_name, $name) {
			# Если имя класса есть в списке
			if (\in_array('\\' . \get_class($v), $this->is_obj[$name])) {return $v;}
			# Ошибонька
			throw new \Exception("Неверный формат свойства \\" . \get_called_class() . "->{$name}. Должен быть объект: " . \implode(', ', $this->is_obj[$name]) . ". Передан: \\" . \get_class($v));
		};
	}





	/** Задаём свойство - массив объектов
	 * @param string $name Имя свойства
	 * @param string $class_name Класс объекта
	 */
	final protected function set_arr($name, $class_name = null) {
		$this->_data[$name] = null;

		if (!is_array($class_name)) {
			$class_name = [$class_name];
		}

		foreach ($class_name as $k => $v) {
			$class_name[$k] = $this->_namespace_object($v);
		}

		$this->is_arr_obj[$name] = $class_name;
		# Фильтр
		$this->_data_filter[$name] = function ($val) use ($class_name, $name) {
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
			# Ошибонька
			throw new \Exception("Неверный формат свойства " . \get_called_class() . "->{$name}. Элемент массива должен быть объектом: " . \implode(', ', $this->is_arr_obj[$name]) . ". Передан: \\" . \get_class($obj_error));
		};
	}





	/** Задаём свойство - массив массивов объектов
	 * @param string $name Имя свойства
	 * @param string $class_name Класс объекта
	 */
	final protected function set_arr_arr($name, $class_name = null) {
		if ($class_name === null) {
			$class_name = $name;
		}
		$this->arr_arr[$name] = null;
		$this->arr_arr_name[$name] = $this->_namespace_object($class_name);
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
					$class_name = $this->is_arr_obj[$k][0];
					# Создаём объект
					$arr_v[] = $this->_create_object($class_name, $v_2);
				}
				$v = $arr_v;
			# Если это просто объект или значение
			} else {
				if (\array_key_exists($k, $this->is_obj)) {
					# Получаем имя объекта
					$class_name = $this->is_obj[$k][0];
					# Создаём объект
					$v = $this->_create_object($class_name, $v);
				}
			}
			# Присваеваем значение
			$this->$k = $v;
		}
	}





	/** Подготовка данных к var_dump() */
	final public function __debugInfo() {
		# Получаем сборку данных (свойства)
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Задаёт данные, которые должны быть сериализованы в JSON */
	final public function jsonSerialize() {
		# Получаем сборку данных (свойства)
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Возвращает ВСЕ свойства объекта для вывода */
	final public function existsProp() {
		# Получаем сборку данных (свойства)
		$arr = $this->__preparationData([], true);
		return $arr;
	}





	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)
	 * @param array $arr Входной массив данных
	 * @param bool $full Маркер вывода всех свойств
	*/
	protected function __preparationData($arr, bool $full = false) {
		# Проходим по всем свойствам
		foreach ($this->_data as $k => $v) {
			# Если не надо отображать все свойства
			if (!$full && $v === null) { continue; }
			# Добавляем элемент
			$arr[$k] = $v;
		}
		if ($this->arr_arr) {
			foreach ($this->arr_arr as $k => $v) {
				if (!$full && $v === null) { continue; }
				$arr[$k] = $v;
			}
		}
		# Возвращаем массив
		return $arr;
	}





	/** */
	final public function __get($name) {
		# Если свойство есть
		if (\array_key_exists($name, $this->_data)) {
			# Возвращаем значение
			return $this->_data[$name];
		}
		if (\array_key_exists($name, $this->arr_arr)) {
			return $this->arr_arr[$name];
		}
		# Ошибонька
		echo '<pre>';
		print_r($this->_data);
		print_r($this->arr_arr);
		throw new \Exception("Вызов неизвестного свойства объекта: \\" . \get_called_class() . "->{$name}");
	}





	/** */
	final public function __set($name, $value) {
		if (\array_key_exists($name, $this->_data)) {
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
			# Иначе строка - имя фильтра
			} else {
				$filter = $this->filter[$filter_name];
			}
			# Выполняем фильтр и записываем результат
			$this->_data[$name] = $filter($value);
			return;
		}
		if (\array_key_exists($name, $this->arr_arr)) {
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
		# Ошибонька
		echo '<pre>';
		print_r($this->_data);
		print_r($this->arr_arr);
		throw new \Exception("Вызов неизвестного свойства объекта: \\" . \get_called_class() . "->{$name}");
	}





/**/
}
