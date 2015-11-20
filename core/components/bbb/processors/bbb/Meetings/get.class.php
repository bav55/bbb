<?php

/**
 * Get a Meeting
 */
class MeetingGetProcessor extends modObjectGetProcessor {
	public $objectType = 'Meeting';
	public $classKey = 'Meeting';
	public $languageTopics = array('bbb:default');
	//public $permission = 'view';


}

return 'MeetingGetProcessor';