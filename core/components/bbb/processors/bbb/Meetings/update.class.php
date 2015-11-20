<?php

/**
 * Update an Meeting
 */
class MeetingUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'Meeting';
	public $classKey = 'Meeting';
	public $languageTopics = array('bbb');
	//public $permission = 'save';


	/**
	 * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return bool|string
	 */
	public function beforeSave() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$id = (int)$this->getProperty('id_meeting');
		$name = trim($this->getProperty('name_meeting'));
		if (empty($id)) {
			return $this->modx->lexicon('bbb_meeting_err_ns');
		}

		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('bbb_meeting_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name_meeting' => $name, 'id_meeting:!=' => $id))) {
			$this->modx->error->addField('name', $this->modx->lexicon('bbb_meeting_err_ae'));
		}

		return parent::beforeSet();
	}
}

return 'MeetingUpdateProcessor';
