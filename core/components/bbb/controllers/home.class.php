<?php

/**
 * The home manager controller for bbb.
 *
 */
class bbbHomeManagerController extends bbbMainController {
	/* @var bbb $bbb */
	public $bbb;


	/**
	 * @param array $scriptProperties
	 */
	public function process(array $scriptProperties = array()) {
	}


	/**
	 * @return null|string
	 */
	public function getPageTitle() {
		return $this->modx->lexicon('bbb');
	}


	/**
	 * @return void
	 */
	public function loadCustomCssJs() {
		$this->addCss($this->bbb->config['cssUrl'] . 'mgr/main.css');
		$this->addCss($this->bbb->config['cssUrl'] . 'mgr/bootstrap.buttons.css');
		$this->addJavascript($this->bbb->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->addJavascript($this->bbb->config['jsUrl'] . 'mgr/widgets/items.grid.js');
		$this->addJavascript($this->bbb->config['jsUrl'] . 'mgr/widgets/items.windows.js');
		$this->addJavascript($this->bbb->config['jsUrl'] . 'mgr/widgets/home.panel.js');
		$this->addJavascript($this->bbb->config['jsUrl'] . 'mgr/sections/home.js');
		$this->addHtml('<script type="text/javascript">
		Ext.onReady(function() {
			MODx.load({ xtype: "bbb-page-home"});
		});
		</script>');
	}


	/**
	 * @return string
	 */
	public function getTemplateFile() {
		return $this->bbb->config['templatesPath'] . 'home.tpl';
	}
}