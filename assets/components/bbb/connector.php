<?php
/** @noinspection PhpIncludeInspection */
require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var bbb $bbb */
$bbb = $modx->getService('bbb', 'bbb', $modx->getOption('bbb_core_path', null, $modx->getOption('core_path') . 'components/bbb/') . 'model/bbb/');
$modx->lexicon->load('bbb:default');

// handle request
$corePath = $modx->getOption('bbb_core_path', null, $modx->getOption('core_path') . 'components/bbb/');
$path = $modx->getOption('processorsPath', $bbb->config, $corePath . 'processors/');
$modx->request->handleRequest(array(
	'processors_path' => $path,
	'location' => '',
));