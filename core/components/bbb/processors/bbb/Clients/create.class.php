<?php

/**
 * Create an Client
 */
class ClientCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'Client';
	public $classKey = 'Client';
	public $languageTopics = array('bbb');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
}

return 'ClientCreateProcessor';