<?php

/**
 * Update an Action
 */
class ActionUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'Action';
	public $classKey = 'Action';
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

}

return 'ActionUpdateProcessor';
