<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой видеофайл.
 */
class VideoNote extends _object_object {

	use _trait__file;



	/** */
	protected function add_setting() {
		$this->set('file_id',          'str');   # Идентификатор этого файла, который можно использовать для загрузки или повторного использования файла.
		$this->set('file_unique_id',   'str');   # Уникальный идентификатор этого файла, который должен быть одинаковым с течением времени и для разных ботов. Невозможно использовать для загрузки или повторного использования файла.
		$this->set('length',           'int');   # Этот объект представляет собой видеофайл.
		$this->set('duration',         'int');   # Продолжительность видео в секундах, определенная отправителем
		$this->set_obj('thumb',        'PhotoSize');   # Опционально. Миниатюра видео
		$this->set('file_size',        'int');   # Опционально. Размер файла
	}


/**/
}