<?php

namespace RusaDrako\telegram_bot_engine\object;

/**
 * Получив сообщение с этим объектом, клиенты Telegram будут отображать интерфейс ответа для пользователя (действовать так, как если бы пользователь выбрал сообщение бота и нажал «Ответить»). Это может быть чрезвычайно полезно, если вы хотите создавать удобные пошаговые интерфейсы, не жертвуя режимом конфиденциальности.
 */
class ForceReply extends _object_object {



	/** */
	protected function add_setting() {
		$this->set('force_reply',   'true');   # Отображает интерфейс ответа для пользователя, как если бы он вручную выбрал сообщение бота и нажал «Ответить»
		$this->force_reply = TRUE;
		$this->set('selective',     'str');   # Опционально. Используйте этот параметр, если вы хотите принудительно отвечать только определенным пользователям. Цели: 1) пользователи, @ упомянутые в тексте объекта Сообщение; 2) если сообщение бота является ответом (имеет reply_to_message_id), отправитель исходного сообщения.
	}



/**/
}
