<?php

/**
 * Remove an Items
 */
class bbbOfficeItemRemoveProcessor extends modObjectProcessor {
	public $objectType = 'bbbItem';
	public $classKey = 'bbbItem';
	public $languageTopics = array('bbb');
	//public $permission = 'remove';


	/**
	 * @return array|string
	 */
	public function process() {
		if (!$this->checkPermissions()) {
			return $this->failure($this->modx->lexicon('access_denied'));
		}

		$ids = $this->modx->fromJSON($this->getProperty('ids'));
		if (empty($ids)) {
			return $this->failure($this->modx->lexicon('bbb_item_err_ns'));
		}

		foreach ($ids as $id) {
			/** @var bbbItem $object */
			if (!$object = $this->modx->getObject($this->classKey, $id)) {
				return $this->failure($this->modx->lexicon('bbb_item_err_nf'));
			}

			$object->remove();
		}

		return $this->success();
	}

}

return 'bbbOfficeItemRemoveProcessor';