<?php

/**
 * Create an Action
 */
class ActionCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'Action';
	public $classKey = 'Action';
	public $languageTopics = array('bbb');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
}

return 'ActionCreateProcessor';