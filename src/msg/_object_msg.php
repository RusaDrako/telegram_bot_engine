<?php

namespace RusaDrako\telegram_bot_engine\msg;

/**
 *
 */
class _object_msg implements \JsonSerializable {



	/** Подготовка данных к var_dump() */
	public function __debugInfo() {
		$arr = $this->__preparationData([]);
		return $arr;
	}





	/** Подготовка данных к серилизации JSON (JsonSerializable) */
	public function jsonSerialize() {
		$arr = $this->__preparationData([]);
		return $arr;
	}



	/** Подготовка данных к var_dump() и серилизации JSON (JsonSerializable)*/
	protected function __preparationData() {
		return $this->data;
	}



/**/
}
