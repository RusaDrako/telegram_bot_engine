<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет фотографию для отправки.
 */
class InputMediaPhoto extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('type',                   'str');   # Тип результата, обязательно фотография
		$this->set('media',                  'str');   # Файл для отправки. Передайте file_id для отправки файла, который существует на серверах Telegram (рекомендуется), передайте URL-адрес HTTP для Telegram, чтобы получить файл из Интернета, или передайте «attach: // <file_attach_name>», чтобы загрузить новый, используя multipart / данные формы под именем <file_attach_name>.
		$this->set('caption',                'str');   # Опционально. Подпись к отправляемой фотографии, 0-1024 символа после синтаксического анализа сущностей
		$this->set('parse_mode',             'str');   # Опционально. Режим разбора сущностей в подписи к фото.
		$this->set_arr('caption_entities',   'MessageEntity');   # Опционально. Список особых сущностей, которые появляются в заголовке, которые можно указать вместо parse_mode
	}



/**/
}
