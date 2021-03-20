<?php

namespace RusaDrako\telegram_bot_engine\method;

/**
 *
 */
class method extends _object_method {

//	use trait__set_bot;
	/** Выводит информацию */
//	use trait__info;



	private $to = null;
	private $msg = null;
	private $photo = null;
	private $video = null;
	private $document = null;
	private $button = [];





	/** */
	function __construct() {}





	/** Привязываем бот * /
	function set_bot($bot) {
		$this->bot = $bot;
	}





	/** Привязываем бот * /
	private function _request($command, $post = []) {
		$result = $this->bot->_curl($command, $post);
		return $result;
	}





	/** Привязываем бот * /
	private function _request_obj($command, $class, $post = []) {
		$_result = $this->_request($command, $post);
		$result = new \RusaDrako\telegram_bot_engine\result\result();
//		$result->set_bot($this->bot);
		$result->result_type_obj($class);
		$result->set_data($_result);
		return $result;
	}





	/** Привязываем бот * /
	private function _request_arr($command, $class, $post = []) {
		$_result = $this->_request($command, $post);
		$result = new \RusaDrako\telegram_bot_engine\result\result();
//		$result->set_bot($this->bot);
		$result->result_type_arr($class);
		$result->set_data($_result);
//		$result->result = $this->set_object('object\result', $_result);
		return $result;
	}





	/** Проверяет аутентификацию подключения к боту */
	function getMe() {
		$post = [];
		$result = $this->_request_obj('getMe', 'User', $post);
//		$this->_info($result, __METHOD__);
		return $result;
	}

	/** */
	function logOut() {
	}

	/** */
	function close() {
	}

	/** */
	function sendMessage() {
	}

	/** */
	function forwardMessage() {
	}

	/** */
	function copyMessage() {
	}

	/** */
	function sendPhoto() {
	}

	/** */
	function sendAudio() {
	}

	/** */
	function sendDocument() {
	}

	/** */
	function sendVideo() {
	}

	/** */
	function sendAnimation() {
	}

	/** */
	function sendVoice() {
	}

	/** */
	function sendVideoNote() {
	}

	/** */
	function sendMediaGroup() {
	}

	/** */
	function sendLocation() {
	}

	/** */
	function editMessageLiveLocation() {
	}

	/** */
	function stopMessageLiveLocation() {
	}

	/** */
	function sendVenue() {
	}

	/** */
	function sendContact() {
	}

	/** */
	function sendPoll() {
	}

	/** */
	function sendDice() {
	}

	/** */
	function sendChatAction() {
	}

	/** */
	function getUserProfilePhotos($id) {
		$post = ['user_id' => $id];
		$result = $this->_request_obj('getUserProfilePhotos', 'UserProfilePhotos', $post);
//		$this->_info($result, __METHOD__);
		return $result;
	}

	/** Получает файл по ID */
	function getFile($id) {
		$post = ['file_id' => $id];
		$result = $this->_request_obj('getFile', 'File', $post);
//		$this->_info($result, __METHOD__);
		return $result;
	}

	/** */
	function kickChatMember() {
	}

	/** */
	function unbanChatMember() {
	}

	/** */
	function restrictChatMember() {
	}

	/** */
	function promoteChatMember() {
	}

	/** */
	function setChatAdministratorCustomTitle() {
	}

	/** */
	function setChatPermissions() {
	}

	/** */
	function exportChatInviteLink() {
	}

	/** */
	function createChatInviteLink() {
	}

	/** */
	function editChatInviteLink() {
	}

	/** */
	function revokeChatInviteLink() {
	}

	/** */
	function setChatPhoto() {
	}

	/** */
	function deleteChatPhoto() {
	}

	/** */
	function setChatTitle() {
	}

	/** */
	function setChatDescription() {
	}

	/** */
	function pinChatMessage() {
	}

	/** */
	function unpinChatMessage() {
	}

	/** */
	function unpinAllChatMessages() {
	}

	/** */
	function leaveChat() {
	}

	/** Получает актуальную информацию о чате (текущее имя пользователя для разговоров один на один, текущее имя пользователя, группы или канала и т. Д.). В случае успеха возвращает объект Chat.  */
	function getChat($id) {
		$post = ['chat_id' => $id];
		$result = $this->_request_obj('getChat', 'Chat', $post);
		$this->_info($result, __METHOD__);
		return $result;
	}

	/** */
	function getChatAdministrators() {
	}

	/** */
	function getChatMembersCount() {
	}

	/** */
	function getChatMember() {
	}


/*	setChatStickerSet
	deleteChatStickerSet
	answerCallbackQuery
	setMyCommands
	getMyCommands
	Inline mode methods/**/





	/** * /
	function set_object_arr($class_name, $data) {
		$result = [];
		foreach ($data as $k => $v) {
			$result[] = $this->set_object($class_name, $v);
		}
		return $result;
	}





	/** * /
	function set_object($class_name, $data) {
		$class_name = __NAMESPACE__ . '\\' . $class_name;
		$obj = new $class_name();
		$obj->set_bot($this->bot);
		$obj->set_data($data);
		return $obj;
	}





	/** */
	public function test_method() {
		$this->getMe();
//		$this->getWebhookInfo();
//		$this->getUpdates();
		$this->getUserProfilePhotos(1175393600);
		$this->getChat(1175393600);
		/**/
//		$this->getFile('AgACAgIAAxkBAAMxYEDUcsDFEQgzCVJfJCQuGVRcc2AAAlmwMRumEghKLzrYs4tVimrTagABny4AAwEAAwIAA3kAA4jjAAIeBA');/**/
	}





/**/
}
