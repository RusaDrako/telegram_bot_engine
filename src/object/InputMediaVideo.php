<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Представляет видео для отправки.
 */
class InputMediaVideo extends InputMedia {



	/** */
	protected function add_setting() {
		parent::add_setting();
//$this->set('type',                   'str');   # Тип результата, должно быть video
		$this->type = 'video';
//		$this->set('media',                  'str');   # Файл для отправки. Передайте file_id для отправки файла, который существует на серверах Telegram (рекомендуется), передайте URL-адрес HTTP для Telegram, чтобы получить файл из Интернета, или передайте «attach: // <file_attach_name>», чтобы загрузить новый, используя multipart / данные формы под именем <file_attach_name>.
		# FIXIT thumb InputFile или String
		$this->set_obj('thumb',              'InputFile');   # Опционально. Эскиз отправленного файла; можно игнорировать, если создание миниатюр для файла поддерживается на стороне сервера. Миниатюра должна быть в формате JPEG и размером менее 200 КБ. Ширина и высота эскиза не должны превышать 320. Игнорируется, если файл не загружен с использованием multipart / form-data. Эскизы не могут быть повторно использованы и могут быть загружены только как новый файл, поэтому вы можете передать «attach: // <file_attach_name>», если эскиз был загружен с использованием multipart / form-data в <file_attach_name>. Подробнее об отправке файлов »
//		$this->set('caption',                'str');   # Опционально. Подпись к отправляемому видео, 0-1024 символа после синтаксического анализа сущностей
//		$this->set('parse_mode',             'str');   # Опционально. Режим разбора сущностей в подписи к видео.
//		$this->set_arr('caption_entities',   'MessageEntity');   # Опционально. Список особых сущностей, которые появляются в заголовке, которые можно указать вместо parse_mode
		$this->set('width',                  'int');   # Опционально. Ширина видео
		$this->set('height',                 'int');   # Опционально. Высота видео
		$this->set('duration',               'int');   # Опционально. Продолжительность видео
		$this->set('supports_streaming',     'int');   # Опционально. Pass True, если загруженное видео подходит для потоковой передачи
	}



/**/
}
