<?php

/**
 * Enable a Client
 */
class ClientEnableProcessor extends modObjectProcessor {
    public $objectType = 'Client';
    public $classKey = 'Client';
    public $languageTopics = array('bbb');
	//public $permission = 'save';


}

return 'ClientEnableProcessor';
