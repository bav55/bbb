<?php

/**
 * Enable a Meeting
 */
class MeetingEnableProcessor extends modObjectProcessor {
    public $objectType = 'Meeting';
    public $classKey = 'Meeting';
    public $languageTopics = array('bbb');
	//public $permission = 'save';


}

return 'MeetingEnableProcessor';
