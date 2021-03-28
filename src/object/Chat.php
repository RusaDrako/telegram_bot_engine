<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Этот объект представляет собой чат.
 */
class Chat extends _object_object {

	/** https://tlgrm.ru/docs/bots/api#chat */
	protected function add_setting() {
		$this->set('id',                    'int');   # Уникальный идентификатор чата. Абсолютное значение не превышает 1e13
		$this->set('type',                  'str');   # Тип чата: “private”, “group”, “supergroup” или “channel”
		$this->set('title',                 'str');   # Опционально. Название, для каналов или групп
		$this->set('username',              'str');   # Опционально. Username, для чатов и некоторых каналов
		$this->set('first_name',            'str');   # Опционально. Имя собеседника в чате
		$this->set('last_name',             'str');   # Опционально. Фамилия собеседника в чате

		$this->set_obj('photo',             'ChatPhoto' );   # Опционально. Фото чата. Возвращает только через getChat

		$this->set('bio',                   'str');   # Опционально. Био другой части приватного чата. Возвращает только через getChat
		$this->set('description',           'str');   # Опционально. Описание группы, супергруп и канала. Возвращает только через getChat
		$this->set('invite_link',           'str');   # Опционально. Ссылка для приглашения в чат для групп, супергрупп и чатов каналов. Каждый администратор в чате генерирует свои собственные пригласительные ссылки, поэтому бот должен сначала сгенерировать ссылку с помощью exportChatInviteLink. Возвращает только через getChat
		$this->set_obj('pinned_message',    'Message');   # Опционально. Последнее закрепленное сообщение (по дате отправки). Возвращает только через getChat
		$this->set_obj('permissions',       'ChatPermissions');   # Опционально. Разрешения участников чата по умолчанию для групп и супергрупп. Возвращает только через getChat
		$this->set('slow_mode_delay',       'int');   # Опционально. Для супергрупп - минимально допустимая задержка между последовательными сообщениями, отправляемыми каждым непривилегированным пользователем. Возвращает только через getChat
		$this->set('all_members_are_administrators',   'bool');  # Опционально.True, если все участники чата являются администраторами
		$this->set('sticker_set_name',      'str');   # Опционально. Для супергрупп - название набора групповых стикеров. Возвращает только через getChat
		$this->set('can_set_sticker_set',   'bool');   # Опционально. True, если бот умеет менять групповой набор стикеров. Возвращает только через getChat
		$this->set('linked_chat_id',        'int');   # Опционально. Уникальный идентификатор связанного чата, то есть идентификатор группы обсуждения для канала и наоборот; для супергрупп и чатов каналов. Длина этого идентификатора может превышать 32 бита, и некоторые языки программирования могут иметь затруднения / молчаливые дефекты при его интерпретации. Но он меньше 52 бит, поэтому 64-битное целое число со знаком или тип с плавающей запятой двойной точности безопасны для хранения этого идентификатора. Возвращает только через getChat
		$this->set_obj('location',          'ChatLocation');   # Опционально. Для супергрупп - место, к которому подключается супергруппа. Возвращает только через getChat




	}



/**/
}
