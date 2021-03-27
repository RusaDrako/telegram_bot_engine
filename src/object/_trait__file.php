<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 *
 */
trait _trait__file {



	/** Получаем объект файла */
	public function get_file() {
		$result = $this->bot
			->method('getFile')
//			->set_bot($this->bot)
			->file_id($this->file_id)
			->execute();
		return $result->result;
	}



/**/
}
