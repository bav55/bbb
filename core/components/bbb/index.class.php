<?php

/**
 * Class bbbMainController
 */
abstract class bbbMainController extends modExtraManagerController {
	/** @var bbb $bbb */
	public $bbb;


	/**
	 * @return void
	 */
	public function initialize() {
		$corePath = $this->modx->getOption('bbb_core_path', null, $this->modx->getOption('core_path') . 'components/bbb/');
		require_once $corePath . 'model/bbb/bbb.class.php';

		$this->bbb = new bbb($this->modx);
		//$this->addCss($this->bbb->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->bbb->config['jsUrl'] . 'mgr/bbb.js');
		$this->addHtml('
		<script type="text/javascript">
			bbb.config = ' . $this->modx->toJSON($this->bbb->config) . ';
			bbb.config.connector_url = "' . $this->bbb->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('bbb:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends bbbMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}