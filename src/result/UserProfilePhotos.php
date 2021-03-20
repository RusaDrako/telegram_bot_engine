<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 * 
 */
class UserProfilePhotos extends _object_result {



	/** https://core.telegram.org/bots/api#chat */
	function add_setting() {
		$this->set('total_count',   'int');    # Общее количество изображений профиля целевого пользователя.
		$this->set_arr('photos',    'PhotoSize');   # Запрошенные изображения профиля (до 4 размеров каждый)
	}



/**/
}
