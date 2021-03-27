<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
trait _trait__response {



	/** */
	protected function _request($command, $post = []) {
/*		print_r($command);
		print_r($post);/**/
		$result = $this->bot->_curl($command, $post);
		return $result;
	}





	/** */
	protected function _request_obj($command, $class, $post = []) {
		$_result = $this->_request($command, $post);
		$result = (new \RusaDrako\telegram_bot_engine\object\response())->set_bot($this->bot);
//		$result->set_bot($this->bot);
		$result->result_type_obj($class);
		$result->set_data($_result);
		return $result;
	}





	/** */
	protected function _request_arr($command, $class, $post = []) {
		$_result = $this->_request($command, $post);
		$result = (new \RusaDrako\telegram_bot_engine\object\response())->set_bot($this->bot);
//		$result->set_bot($this->bot);
		$result->result_type_arr($class);
		$result->set_data($_result);
//		$result->result = $this->set_object('object\result', $_result);
		return $result;
	}



/**/
}
