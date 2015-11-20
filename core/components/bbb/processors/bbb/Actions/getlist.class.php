<?php

/**
 * Get a list of Items
 */
class ActionGetListProcessor extends modObjectGetListProcessor {
	public $objectType = 'Action';
	public $classKey = 'Action';
	public $defaultSortField = 'id_action';
	public $defaultSortDirection = 'DESC';
	//public $permission = 'list';


	/**
	 * * We doing special check of permission
	 * because of our objects is not an instances of modAccessibleObject
	 *
	 * @return boolean|string
	 */
	public function beforeQuery() {
		if (!$this->checkPermissions()) {
			return $this->modx->lexicon('access_denied');
		}

		return true;
	}

	/**
	 * @param xPDOObject $object
	 *
	 * @return array
	 */
	public function prepareRow(xPDOObject $object) {
		$array = $object->toArray();
		$array['actions'] = array();

		// Edit
		$array['actions'][] = array(
			'cls' => '',
			'icon' => 'fa fa-edit',
			'title' => $this->modx->lexicon('bbb_action_update'),
			//'multiple' => $this->modx->lexicon('bbb_items_update'),
			'action' => 'updateItem',
			'button' => true,
			'menu' => true,
		);

		if (!$array['active']) {
			$array['actions'][] = array(
				'cls' => '',
				'icon' => 'fa fa-power-off action-green',
				'title' => $this->modx->lexicon('bbb_action_enable'),
				//'multiple' => $this->modx->lexicon('bbb_items_enable'),
				'action' => 'enableItem',
				'button' => true,
				'menu' => true,
			);
		}
		else {
			$array['actions'][] = array(
				'cls' => '',
				'icon' => 'fa fa-power-off action-gray',
				'title' => $this->modx->lexicon('bbb_action_disable'),
				//'multiple' => $this->modx->lexicon('bbb_items_disable'),
				'action' => 'disableItem',
				'button' => true,
				'menu' => true,
			);
		}

		// Remove
		$array['actions'][] = array(
			'cls' => '',
			'icon' => 'fa fa-trash-o action-red',
			'title' => $this->modx->lexicon('bbb_action_remove'),
			//'multiple' => $this->modx->lexicon('bbb_items_remove'),
			'action' => 'removeItem',
			'button' => true,
			'menu' => true,
		);

		return $array;
	}

}

return 'ActionGetListProcessor';