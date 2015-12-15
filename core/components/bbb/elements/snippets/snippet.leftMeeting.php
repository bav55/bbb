<?php
//$modx->log(xPDO::LOG_LEVEL_ERROR,'message from leftMeeting');
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','leftMeeting',__FILE__,__LINE__);
}
$id_meeting = $modx->getOption('id_meeting',$scriptProperties,null,true);
$id_client = $modx->getOption('id_client',$scriptProperties,null,true);

//создать действие USER_LEFT_MEETING
$actiontype = $modx->getObject('ActionTypes',array('name' => 'USER_LEFT_MEETING'));
$action = $modx->newObject('Actions', array(
    'id_client' => $id_client,
    'id_meeting' => $id_meeting,
    'id_actiontype' => $actiontype->get('id'),
    'timestamp_action' => time(),
));
if ($action->save()=== false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
return '';