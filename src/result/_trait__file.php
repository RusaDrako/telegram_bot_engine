<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 *
 */
trait _trait__file {



	/** Получаем объект файла */
	public function get_file() {
		$result = $this->bot->method()->getFile($this->file_id);
		return $result->result;
	}



/**/
}
