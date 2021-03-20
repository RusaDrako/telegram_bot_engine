<?php

namespace RusaDrako\telegram_bot_engine\msg;

/**
 *
 */
trait trait__info {

	private $test = false;



	/** Выводит информацию */
	public function test($value) {
		$this->test = (bool) $value;
	}





	/** Выводит информацию */
	protected function _info($data, $title = null) {
		if (!$this->bot->get_test()) { return;}
		echo '<pre style="border: 1px solid #777; background: #fdb; padding: 10px;">';
		if ($title) {
			echo $title . '<br><br>';
		}
//		\var_dump($data);
		\print_r($data);
		echo '</pre>';/**/
	}



/**/
}
