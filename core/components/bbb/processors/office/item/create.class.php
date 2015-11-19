<?php

/**
 * Create an Item
 */
class bbbOfficeItemCreateProcessor extends modObjectCreateProcessor {
	public $objectType = 'bbbItem';
	public $classKey = 'bbbItem';
	public $languageTopics = array('bbb');
	//public $permission = 'create';


	/**
	 * @return bool
	 */
	public function beforeSet() {
		$name = trim($this->getProperty('name'));
		if (empty($name)) {
			$this->modx->error->addField('name', $this->modx->lexicon('bbb_item_err_name'));
		}
		elseif ($this->modx->getCount($this->classKey, array('name' => $name))) {
			$this->modx->error->addField('name', $this->modx->lexicon('bbb_item_err_ae'));
		}

		return parent::beforeSet();
	}

}

return 'bbbOfficeItemCreateProcessor';