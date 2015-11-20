<?php

/**
 * Update an Client
 */
class ClientUpdateProcessor extends modObjectUpdateProcessor {
	public $objectType = 'Client';
	public $classKey = 'Client';
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
		$id = (int)$this->getProperty('id_client');
		$name = trim($this->getProperty('firstname'));
		if (empty($id)) {
			return $this->modx->lexicon('bbb_client_err_ns');
		}

		return parent::beforeSet();
	}
}

return 'ClientUpdateProcessor';
