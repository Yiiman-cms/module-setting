<?php

	
	namespace system\module\medline;
	
	class EventHandler {
		public function onAny($update)
		{
			if (isset($update['message']['out']) && $update['message']['out']) {
				return;
			}
			if (isset($update['message']['media']) && $update['message']['media']['_'] !== 'messageMediaGame') {
				yield $this->download_to_dir($update, '/tmp');
				yield $this->messages->sendMedia(['peer' => $update, 'message' => $update['message']['message'], 'media' => $update]);
			}
			
			$res = json_encode($update, JSON_PRETTY_PRINT);
			
			yield $this->sleep(3);
			
			try {
				yield $this->sm($update, "<code>$res</code>\nAsynchronously, after 3 seconds");
			} catch (\danog\MadelineProto\RPCErrorException $e) {
				\danog\MadelineProto\Logger::log((string) $e, \danog\MadelineProto\Logger::FATAL_ERROR);
			} catch (\danog\MadelineProto\Exception $e) {
				\danog\MadelineProto\Logger::log((string) $e, \danog\MadelineProto\Logger::FATAL_ERROR);
			}
		}
		public function sm($peer, $message)
		{
			yield $this->messages->sendMessage(['peer' => $peer, 'message' => $message, 'reply_to_msg_id' => isset($update['message']['id']) ? $update['message']['id'] : null, 'parse_mode' => 'HTML']);
		}
	}
