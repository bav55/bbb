<?php
//$modx->log(xPDO::LOG_LEVEL_ERROR,'message from leaveFeedback');
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','waitMeeting',__FILE__,__LINE__);
}
$allFormFields = $_POST;
if($allFormFields['email_']!=''){ return false;}        //spam-проверка
//$modx->log(xPDO::LOG_LEVEL_ERROR,'COOKIE='.print_r($_POST,true));
$id_client =  $allFormFields['id_client'];
$id_meeting =  $allFormFields['id_meeting'];
$feedback = $allFormFields['feedback'];
$meeting = $modx->getObject('Meetings', array('id_meeting' => $id_meeting));
$logoutUrl = $meeting->get('logoutUrl');

//создать действие USER_SENT_REVIEW
$actiontype = $modx->getObject('ActionTypes',array('name' => 'USER_SENT_REVIEW'));
$action = $modx->newObject('Actions', array(
    'id_client' => $id_client,
    'id_meeting' => $id_meeting,
    'id_actiontype' => $actiontype->get('id'),
    'timestamp_action' => time(),
    'extended' => array(
        'feedback' => $feedback,
    ),
));
if ($action->save()=== false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
//удалить куки
$modx->runSnippet('setCookie', array(
    'name' => 'bbb_meeting',
    'expires' => -3600,
));
$modx->runSnippet('setCookie', array(
    'name' => 'bbb_client',
    'expires' => -3600,
));
//перенаправить на logoutUrl
$modx->sendRedirect($logoutUrl);