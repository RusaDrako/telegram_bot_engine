<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Представляет общий файл для отправки.
 */
class InputMediaDocument extends InputMedia {



	/** */
	protected function add_setting() {
		parent::add_setting();
//$this->set('type',                   'str');   # Тип результата, должно быть document
		$this->type = 'document';
//		$this->set('media',                  'str');   # Файл для отправки. Передайте file_id для отправки файла, который существует на серверах Telegram (рекомендуется), передайте URL-адрес HTTP для Telegram, чтобы получить файл из Интернета, или передайте «attach: // <file_attach_name>», чтобы загрузить новый, используя multipart / данные формы под именем <file_attach_name>. Подробнее об отправке файлов »
		# FIXIT thumb InputFile или String
		$this->set_obj('thumb',              'InputFile');   # Опционально. Эскиз отправленного файла; можно игнорировать, если создание миниатюр для файла поддерживается на стороне сервера. Миниатюра должна быть в формате JPEG и размером менее 200 КБ. Ширина и высота эскиза не должны превышать 320. Игнорируется, если файл не загружен с использованием multipart / form-data. Эскизы не могут быть повторно использованы и могут быть загружены только как новый файл, поэтому вы можете передать «attach: // <file_attach_name>», если эскиз был загружен с использованием multipart / form-data в <file_attach_name>. Подробнее об отправке файлов »
//		$this->set('caption',                'str');   # Опционально. Заголовок отправляемого документа, 0-1024 символа после синтаксического анализа сущностей
//		$this->set('parse_mode',             'str');   # Опционально. Режим разбора сущностей в заголовке документа.
//		$this->set_arr('caption_entities',   'MessageEntity');   # Опционально. Список особых сущностей, которые появляются в заголовке, которые можно указать вместо parse_mode
		$this->set('disable_content_type_detection',   'bool');   # Опционально. Отключает автоматическое определение типа содержимого на стороне сервера для файлов, загруженных с использованием multipart / form-data. Всегда верно, если документ отправляется в составе альбома.
	}



/**/
}
