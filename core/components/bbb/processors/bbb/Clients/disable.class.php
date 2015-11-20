<?php

/**
 * Disable a Client
 */
class ClientDisableProcessor extends modObjectProcessor {
	public $objectType = 'Client';
	public $classKey = 'Client';
	public $languageTopics = array('bbb');
	//public $permission = 'save';


	/**
	 * @return array|string
	 */

}

return 'ClientDisableProcessor';
