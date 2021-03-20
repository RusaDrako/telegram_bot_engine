<?php

namespace RusaDrako\telegram_bot_engine;

/**
 * Telegram Bot
 */
class telegram_bot {


	private $link    = 'https://api.telegram.org/';
	private $token   = null;
	private $name    = '';
	private $test    = false;





	/** */
	public function __construct(string $token, string $name = '') {
		$this->token = $token;
		$this->name = $name;
	}





	/** */
	public function set_test($value) {
		$this->test = (bool) $value;
	}





	/** */
	public function get_test() {
		return $this->test;
	}





	/** */
	public function _curl($command, $post = [], $result = null) {
		if ($result === null) {
			$result = new result\result();
		}
		# Запускай curl
		$curl = curl_init();
		# Формируем
		$url = $this->insert_token("bot:bot-token:/{$command}");
		# Выполняем настройки
		curl_setopt_array(
			$curl,
			[
				CURLOPT_URL              => $url,
				CURLOPT_POST             => TRUE,
				CURLOPT_RETURNTRANSFER   => TRUE,
				CURLOPT_TIMEOUT          => 10,
				CURLOPT_POSTFIELDS       => $post,
			]
		);
		# Выполняем curl
		$result = curl_exec($curl);
		# Если curl выдал ошибку
		if ($result === false) {
			# Выводим сообщение
			echo 'Ошибка curl: ' . curl_error($curl);
			# Закрываем соединение
			curl_close($curl);
			return [];
		}
		# Закрываем соединение
		curl_close($curl);
		# Декодируем результат
		$arr_result = \json_decode($result, true);
		# Если telegram выдал ошибку
		if (!$arr_result['ok']) {
			# Выводим сообщение
			echo $arr_result['error_code'] . ' ' . $arr_result['description'];
		}
		return $arr_result;
	}





	/** Возвращает объект сообщения */
	public function msg() {
		$obj = new msg\msg();
		$obj->set_bot($this);
		return $obj;
	}





	/* * Возвращает объект setup */
	public function method() {
		$obj = new method\method();
		$obj->set_bot($this);
		return $obj;
	}





	/** Возвращает объект setup */
	public function webhook() {
		$obj = new method\Webhook();
		$obj->set_bot($this);
		return $obj;
	}





	/** Добавление токена в строку */
	public function insert_token($str) {
		$str = $this->link . \str_replace(':bot-token:', $this->token, $str);
		return $str;
	}





/**/
}
