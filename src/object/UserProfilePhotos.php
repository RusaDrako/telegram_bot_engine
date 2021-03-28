<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 *
 */
class UserProfilePhotos extends _object_object {



	/** https://core.telegram.org/bots/api#chat */
	protected function add_setting() {
		$this->set('total_count',   'int');    # Общее количество изображений профиля целевого пользователя.
		$this->set_arr_arr('photos',    'PhotoSize');   # Запрошенные изображения профиля (до 4 размеров каждый)
	}



/**/
}
