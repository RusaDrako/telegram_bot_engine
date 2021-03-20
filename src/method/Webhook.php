<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class Webhook extends _object_method {

//	use trait__set_bot;
//	use _trait__request;
	/** Выводит информацию */
//	use trait__info;



	/** Проверяет текущий статус вебхука */
	public function getWebhookInfo() {
		$post = [];
		$result = $this->_request_obj('getWebhookInfo', 'WebhookInfo', $post);
//		$this->_info($result, __METHOD__);
		return $result;
	}



	/** Получает данные по последним сообщениям для бота (за последние сутки) */
	public function getUpdates($id = 0) {
		$post = ['offset' => $id];
		$result = $this->_request_arr('getUpdates', 'Update', $post);
//		$this->_info($result, __METHOD__);
		return $result;
	}



/**/
}
