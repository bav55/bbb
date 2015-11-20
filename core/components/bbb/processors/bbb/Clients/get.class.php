<?php

/**
 * Get a Client
 */
class ClientGetProcessor extends modObjectGetProcessor {
	public $objectType = 'Client';
	public $classKey = 'Client';
	public $languageTopics = array('bbb:default');
	//public $permission = 'view';


}

return 'ClientGetProcessor';