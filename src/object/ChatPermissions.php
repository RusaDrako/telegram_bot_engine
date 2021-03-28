<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Описывает действия, которые пользователь без прав администратора может выполнять в чате.
 */
class ChatPermissions extends _object_object {

	/** https://tlgrm.ru/docs/bots/api#chat */
	protected function add_setting() {
		$this->set('can_send_messages',           'bool');  # Опционально. True, если пользователю разрешено отправлять текстовые сообщения, контакты, места и места проведения
		$this->set('can_send_media_messages',     'bool');  # Опционально. True,если пользователю разрешено отправлять аудио, документы, фотографии, видео, видеозаметки и голосовые заметки, подразумевается can_send_messages
		$this->set('can_send_polls',              'bool');  # Опционально. True, если пользователю разрешено отправлять опросы, подразумевается can_send_messages
		$this->set('can_send_other_messages',     'bool');  # Опционально. True, если пользователю разрешено отправлять анимацию, игры, стикеры и использовать встроенных ботов, подразумевается can_send_media_messages
		$this->set('can_add_web_page_previews',   'bool');  # Опционально. True, если пользователю разрешено добавлять превью веб-страницы в свои сообщения, подразумевается can_send_media_messages
		$this->set('can_change_info',             'bool');  # Опционально. True, если пользователю разрешено изменять название чата, фото и другие настройки. Игнорируется в публичных супергруппах
		$this->set('can_invite_users',            'bool');  # Опционально. True, если пользователю разрешено приглашать новых пользователей в чат
		$this->set('can_pin_messages',            'bool');  # Опционально. True, если пользователю разрешено закреплять сообщения. Игнорируется в публичных супергруппах
	}



/**/
}
