<?php

/**
 * Remove a Client
 */
class ClientRemoveProcessor extends modObjectProcessor {
	public $objectType = 'Client';
	public $classKey = 'Client';
	public $languageTopics = array('bbb');
	//public $permission = 'remove';


}

return 'ClientRemoveProcessor';