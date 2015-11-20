<?php

/**
 * Remove a Meeting
 */
class MeetingRemoveProcessor extends modObjectProcessor {
	public $objectType = 'Meeting';
	public $classKey = 'Meeting';
	public $languageTopics = array('bbb');
	//public $permission = 'remove';


}

return 'MeetingRemoveProcessor';