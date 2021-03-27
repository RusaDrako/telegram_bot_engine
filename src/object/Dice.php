<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой анимированный смайлик, отображающий случайное значение.
 */
class Dice extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('emoji',   'str');   # Emoji, на котором основана анимация броска кости
		$this->set('value',   'int');   # Значение кубика, 1-6 для базовых смайлов «🎲», «🎯» и «🎳», 1-5 для базовых смайлов «🏀» и «⚽», 1-64 для базовых смайлов «🎰»
	}



/**/
}
