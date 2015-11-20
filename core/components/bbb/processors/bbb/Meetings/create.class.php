<?php

/**
 * Create an Meeting
 */
class MeetingCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'Meeting';
	public $classKey = 'Meeting';
	public $languageTopics = array('bbb');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
}

return 'MeetingCreateProcessor';