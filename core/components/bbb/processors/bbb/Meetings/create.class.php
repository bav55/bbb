<?php

/**
 * Create an Meeting
 */
class MeetingsCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'Meetings';
	public $classKey = 'Meetings';
	public $languageTopics = array('bbb');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
}

return 'MeetingsCreateProcessor';