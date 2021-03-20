<?php

namespace RusaDrako\telegram_bot_engine\result;

/**
 * Этот объект содержит информацию об опросе.
 */
class Poll extends _object_result {



	/** */
	function add_setting() {
		$this->set('id',                'str');   # Уникальный идентификатор опроса
		$this->set('question',          'str');   # Вопрос для опроса, 1-300 знаков
		$this->set_arr('options',       'PollOption');   # Список опций опроса
		$this->set('total_voter_count',   'int');   # Вопрос для опроса, 1-300 знаков
		$this->set('is_closed',         'bool');   # True, если опрос закрыт
		$this->set('is_anonymous',      'bool');   # True, сли опрос анонимный
		$this->set('type',              'str');   # Тип опроса, в настоящее время может быть «обычным» или «контрольным»
		$this->set('allow_multiple_answers',   'bool');   # True, если опрос разрешает несколько ответов
		$this->set('right_option_id',   'int');   # Опционально. Отсчитываемый от 0 идентификатор правильного варианта ответа. Доступно только для опросов в режиме викторины, которые закрыты, были отправлены (не перенаправлены) ботом или в приватный чат с ботом.
		$this->set('explanation',       'int');   # Опционально. Текст, который отображается, когда пользователь выбирает неправильный ответ или нажимает на значок лампы в опросе в стиле викторины, 0–200 символов
		$this->set_arr('explanation_entities',   'MessageEntity');   # Опционально. Специальные объекты, такие как имена пользователей, URL-адреса, команды ботов и т.д., Которые появляются в объяснении
		$this->set('open_period',       'int');   # Опционально.Время в секундах, в течение которого опрос будет активен после создания.
		$this->set('close_date',        'date');   # Опционально. Момент времени (временная метка Unix), когда опрос будет автоматически закрыт.
	}



/**/
}
