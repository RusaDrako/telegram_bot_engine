<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 * Этот объект представляет аудиофайл, который клиенты Telegram будут рассматривать как музыку.
 */
class Audio extends _object_result {

	use _trait__file;



	/** */
	protected function add_setting() {
		$this->set('file_id',          'str');   # Идентификатор этого файла, который можно использовать для загрузки или повторного использования файла.
		$this->set('file_unique_id',   'str');   # Уникальный идентификатор этого файла, который должен быть одинаковым с течением времени и для разных ботов. Невозможно использовать для загрузки или повторного использования файла.
		$this->set('duration',         'int');   # Продолжительность звука в секундах, определенная отправителем
		$this->set('title',            'str');   # Опционально. Название аудио, определенное отправителем или аудио тегами
		$this->set('file_name',        'str');   # Опционально. Исходное имя файла, определенное отправителем
		$this->set('mime_type',        'str');   # Опционально. MIME-тип файла, определенный отправителем
		$this->set('file_size',        'int');   # Опционально. Размер файла
		$this->set_obj('thumb',        'PhotoSize');   # Опционально. Миниатюра обложки альбома, к которому принадлежит музыкальный файл
	}



/**/
}