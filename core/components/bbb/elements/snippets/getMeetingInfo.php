<?php
/**
Сниппет возвращает с сервера BBB информацию о конкретной встрече. Три параметра: id_meeting, moderatorPw (пароль модератора)  и tpl - чанк оформления вывода
 */
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','getMeetingInfo',__FILE__,__LINE__);
}
//$modx->log(xPDO::LOG_LEVEL_ERROR,print_r($scriptProperties,true));

$include_path = $modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'includes/';
$tpl = $modx->getOption('tpl',$scriptProperties,null,true);
$id_meeting = $modx->getOption('id_meeting',$scriptProperties,null,true);
$moderatorPw = $modx->getOption('moderatorPw',$scriptProperties,null,true);
if($meeting = $modx->getObject('Meetings', array('id_meeting' => $id_meeting))){
    if($meeting->get('moderatorPw') != $moderatorPw){
        $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Указан неверный пароль модератора для встречи');
        return '*';
        return false;
    }
    return '#';
    require_once($include_path.'bbb-api.php');  //Подключаем api BigBlueButton
    $bbb_server = new BigBlueButton();
    $itsAllGood = true;
    try {$answer = $bbb_server->getMeetingInfoWithXmlResponseArray(array('meetingId' => $id_meeting,'password' => $moderatorPw));

    }

    catch (Exception $e) {
        $modx->log(xPDO::LOG_LEVEL_ERROR, $e->getMessage());
        $itsAllGood = false;
        return false;
    }
    if ($itsAllGood == true) {
        if ($answer == null) {
            // Если в ответ получен null, то возможно не откликается сервер BBB
            $modx->log(xPDO::LOG_LEVEL_ERROR, 'Не получен никакой ответ от сервера BBB в ответ на getMeetingInfoWithXmlResponseArray, Возможно, нет соединения с сервером BBB ');
            return false;
        }
        else {
            // We got an XML response, so let's see what it says:
            if (!isset($answer['messageKey'])) {
                $modx->log(xPDO::LOG_LEVEL_ERROR,'Встреча с такими параметрами не найдена на сервере BBB (idmeeting='.$id_meeting.')');
                return false;
            }
            else {
                $modx->log(xPDO::LOG_LEVEL_ERROR,'Невозможно получить инфомрацию о встрече (idmeeting='.$id_meeting.')');
                return false;
            }
        }
    }


}
else{
    return '-';
}
