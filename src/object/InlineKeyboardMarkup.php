<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой встроенную клавиатуру, которая отображается рядом с сообщением, которому она принадлежит. 
 */
class InlineKeyboardMarkup extends _object_object {



	/** */
	protected function add_setting() {
		$this->set_arr_arr('inline_keyboard',           'InlineKeyboardButton');   # Массив строк кнопок, каждая из которых представлена массивом объектов InlineKeyboardButton
	}



/**/
}
