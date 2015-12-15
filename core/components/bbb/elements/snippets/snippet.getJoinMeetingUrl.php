<?php
/**
Сниппет принимает четыре параметра: id_meeting, id_client, user_type (вид пользователя - строка - moderator или attendee)  и опционально -  id_waitpage
 * Если передан третий параметр, то ссылка формируется по особому: ссылаемся на страницу id_waitpage
 * и дополнительными get-параметрами передаем id_meeting, id_client и logonUrl
 * Если же id_waitpage не передан, сниппет возвращает прямую ссылку на вход мероприятия id_meeting для контакта id_client
 */
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','getJoinMeetingUrl',__FILE__,__LINE__);
}
//$modx->log(xPDO::LOG_LEVEL_ERROR,print_r($scriptProperties,true));

$include_path = $modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'includes/';
$id_meeting = $modx->getOption('id_meeting',$scriptProperties,null,true);
$id_client = $modx->getOption('id_client',$scriptProperties,null,true);
$user_type = $modx->getOption('user_type',$scriptProperties,'attendee',true);
$id_waitpage = $modx->getOption('id_waitpage',$scriptProperties,
                                            null,
                                            //$modx->getOption('bbb_waitpage_id')
                                            false);
require_once($include_path.'bbb-api.php');  //Подключаем api BigBlueButton
$bbb_server = new BigBlueButton();
if($meeting = $modx->getObject('Meetings', array('id_meeting' => $id_meeting))){
    $client = $modx->getObject('Clients', array('id_client' => $id_client));
    $joinParams = array(
        //'meetingId' => md5($meeting->get('id_meeting')),
        'meetingId' => $meeting->get('id_meeting'),
        'username' => $client->get('firstname').' '.$client->get('lastname'),
        'createTime' => '',				// Интересно - надо разобраться на будущее.
        'userId' => $id_client,
        'webVoiceConf' => ''
    );
    if($user_type == 'moderator') $joinParams['password'] =  $meeting->get('moderatorPw');
    else $joinParams['password'] =  $meeting->get('attendeePw');
    $itsAllGood = true;
    try {$logonUrl = $bbb_server->getJoinMeetingURL($joinParams);}
    catch (Exception $e) {
        $logonUrl = '';
        $modx->log(xPDO::LOG_LEVEL_ERROR,$e->getMessage(),'','getJoinMeetingUrl',__FILE__,__LINE__);
        $itsAllGood = false;
    }

    if ($itsAllGood == true) {
            $meeting_params = array(
                'id_client'=>$id_client,
                'id_meeting'=>$id_meeting,
                'logonUrl'=>$logonUrl,
            );
            if(isset($id_waitpage))
                    return $modx->getOption('site_url').$modx->makeUrl($id_waitpage,'',$meeting_params);
            else
                return $logonUrl;
    }
}