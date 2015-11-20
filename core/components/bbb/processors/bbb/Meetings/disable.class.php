<?php

/**
 * Disable a Meeting
 */
class MeetingDisableProcessor extends modObjectProcessor {
	public $objectType = 'Meeting';
	public $classKey = 'Meeting';
	public $languageTopics = array('bbb');
	//public $permission = 'save';


	/**
	 * @return array|string
	 */

}

return 'MeetingDisableProcessor';
