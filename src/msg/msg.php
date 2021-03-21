<?php

namespace RusaDrako\telegram_bot_engine\msg;

/**
 * Сообщение от бота
 */
class msg extends _object_msg {



	private $bot = null;

	private $to = null;
	private $msg = null;
	private $photo = null;
	private $video = null;
	private $document = null;
	private $keyboard = null;
	private $parse_mode = null;



	/** */
	function __construct() {}



	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)*/
	protected function __preparationData($arr = []) {
		list($command, $arr) = $this->_generation();
		return $arr;
	}



	/** Привязываем бот */
	public function set_bot($bot) {
		$this->bot = $bot;
		return $this;
	}



	/** Добавляет Id адресата назначения */
	function to($to) {
		$this->to = $to;
		return $this;
	}



	/** Добавляет сообщение */
	function msg($text) {
		$this->msg = $text;
		return $this;
	}



	/** Тип оформления: markdown */
	function markdown() {
		$this->parse_mode = 'Markdown';
		return $this;
	}



	/** Тип оформления: markdown */
	function html() {
		$this->parse_mode = 'HTML';
		return $this;
	}



	/** Добавляет фото */
	function photo($url) {
		$this->photo = $url;
		return $this;
	}



	/* * Добавляет видео * /
	function video($url) {
		$this->video = $url;
		return $this;
	}



	/** Добавляет документ */
	function document($url) {
		$this->document = $url;
		return $this;
	}



	/** Возвращает объект клавиатуры */
	function keyboard() {
		if ($this->keyboard === null) {
			$this->keyboard = new keyboard();
		}
		return $this->keyboard;
	}



	/** Формирует и отправляет сообщение */
	public function send() {
		list($command, $post) = $this->_generation();
		$this->bot->_curl($command, $post);
	}





	/** Подготовка данных сообщения */
	protected function _generation($arr = []) {
		$arr['chat_id'] = $this->to;
		if ($this->photo) {
			$command = 'sendPhoto';
			if ($this->msg) {
				$arr['caption'] = $this->msg;
			}
			$arr['photo'] = $this->photo;
		} elseif ($this->document) {
			$command = 'sendDocument';
			if ($this->msg) {
				$arr['caption'] = $this->msg;
			}
			$arr['document'] = $this->document;
		} else {
			$command = 'sendMessage';
			if ($this->msg) {
				$arr['text'] = $this->msg;
			}
		}

		if ($this->keyboard) {
			$keyboard_type = $this->keyboard->getType();
			$keyboard = [
				"{$keyboard_type}" => $this->keyboard,
				"one_time_keyboard" => true, // можно заменить на FALSE,клавиатура скроется после нажатия кнопки автоматически при True
				"resize_keyboard" => true // можно заменить на FALSE, клавиатура будет использовать компактный размер автоматически при True
			];
			$arr['reply_markup'] = json_encode($keyboard);
		}/**/
		if ($this->parse_mode) {
			$arr['parse_mode'] = $this->parse_mode;
		}/**/

		return [$command, $arr];
	}




	/* * Разбиваем сообщение на массив части *  /
	function _send_msg___arr_sub_str($str_msg) {
		# Максимальная динна
		$max_len = 4096;
		# Длинна строки
		$str_len = \mb_strlen($str_msg);
		# Число необходимых сообщений
		$n = (int)(($str_len / $max_len)) + 1;
		$arr = [];
		# Формируем массив записей
		for ($i = 0; $i < $n ; $i++) {
			# Длинна оставшегося участка
			$len_control = $str_len - $i * $max_len;
			# Определяем длинну отрезка
			$_len = $len_control < $max_len
					? $len_control
					: $max_len;
			# Добавляем элемент в массив
			$arr[] = \mb_substr($str_msg, $i * $max_len, $_len);
		}
		# Возвращаем массив
		return $arr;
	}






/**/
}
