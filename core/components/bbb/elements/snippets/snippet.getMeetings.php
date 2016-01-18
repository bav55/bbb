<?php
/**
Сниппет возвращает с сервера BBB информацию о встречах
 */
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','getMeetings',__FILE__,__LINE__);
}
//$modx->log(xPDO::LOG_LEVEL_ERROR,print_r($scriptProperties,true));

$include_path = $modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'includes/';
$tpl = $modx->getOption('tpl',$scriptProperties,null,true);

require_once($include_path.'bbb-api.php');  //Подключаем api BigBlueButton
$bbb_server = new BigBlueButton();

    $itsAllGood = true;
    try {$answer = $bbb_server->getMeetingsWithXmlResponseArray();
    }
    catch (Exception $e) {
        $modx->log(xPDO::LOG_LEVEL_ERROR, $e->getMessage());
        $itsAllGood = false;
    }
if ($answer == null) {
    // Если в ответ получен null, то возможно не откликается сервер BBB
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'Не получен никакой ответ от сервера BBB в ответ на getMeetingsWithXmlResponseArray, Возможно, нет соединения с сервером BBB ');
    return false;
}
else {
    $modx->setPlaceholder('total_meetings',count($answer)-3);
    $pls = array();
    $output = '';
    foreach($answer as $kod => $meeting){
        if (($kod !== 'message') and ($kod !== 'messageKey') and  ($kod !== 'returncode')){
                foreach($meeting as $id => $value ){
                    $pls[$id] = $value->asXML();
                }
            $output .= $modx->getChunk($tpl,$pls);
        }
    }
    $modx->setPlaceholder('returncode',$answer['returncode']);
    $modx->setPlaceholder('message',$answer['message']);
    $modx->setPlaceholder('messageKey',$answer['messageKey']);
    return($output);
 }