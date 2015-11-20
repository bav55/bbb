<?php
// BASE CONFIGS (set these to match the values from your BBB server)
/* Public test server values from Blind Side Networks:
url: http://test-install.blindsidenetworks.com/bigbluebutton/
salt: 8cd8ef52e8e101574e400365b55e11a6
*/
$bbb_server_url = $modx->getOption('bbb_config_server_base_url');			//достаем из настроек адрес сервера BBB
$bbb_salt   = $modx->getOption('bbb_config_security_salt');				//и секретный ключ сервера BBB
define("CONFIG_SECURITY_SALT", $bbb_salt);
define("CONFIG_SERVER_BASE_URL", $bbb_server_url);
?>