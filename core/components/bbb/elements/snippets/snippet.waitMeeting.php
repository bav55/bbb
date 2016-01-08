<?php
//$modx->log(xPDO::LOG_LEVEL_ERROR,'message from waitMeeting');
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','waitMeeting',__FILE__,__LINE__);
}
$include_path = $modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'includes/';
$ajaxloader_path = MODX_ASSETS_URL . 'components/bbb/';

require_once($include_path.'bbb-api.php');  //Подключаем api BigBlueButton
$bbb_server = new BigBlueButton();

$id_meeting = $modx->getOption('id_meeting',$_GET,'');
$id_client = $modx->getOption('id_client',$_GET,'');
$logonUrl = $modx->getOption('logonUrl',$_GET,'');

$itsAllGood = true;
try {$result = $bbb_server->isMeetingRunningWithXmlResponseArray($id_meeting);}
catch (Exception $e) {
    //echo 'Возникла ошибка: ', $e->getMessage(), "\n";
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! '.$e->getMessage(),'','waitMeeting',__FILE__,__LINE__);
    $itsAllGood = false;
}
if ($itsAllGood == true) {
    $status = $result['running'];

    $holdMessage = '
			<div id="status">
				<p>Ваше мероприятие еще не началось. Пожалуйста, подождите пока ведущий начнет встречу...</p>
				<i class="fa fa-spinner fa-pulse fa-3x fa-fw margin-bottom"></i>
				<p>Вы автоматически войдете на мероприятие, как только оно начнется.</p>
			</div>
		';

    // The meeting is not running yet so hold your horses:
    if ($status == 'false') {
        return $holdMessage;
    }
    else {
        //Добавить действие - "Пользователь вошел на мероприятие"
        $actiontype = $modx->getObject('ActionTypes',array('name' => 'USER_INVOLVED_MEETING'));
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
        //установить куки, чтобы потом перенаправить пользователя на страницу "Оставить отзыв" и узнать его там
        $modx->runSnippet('setCookie', array(
            'name' => 'bbb_client',
            'value' => $id_client,
            'expires' => 43200, //время жизни куки - 12 часов
        ));
        $modx->runSnippet('setCookie', array(
            'name' => 'bbb_meeting',
            'value' => $id_meeting,
            'expires' => 43200, //время жизни куки - 12 часов
        ));
        //Перенаправить пользователя на мероприятие
        if($logonUrl != '') $modx->sendRedirect($logonUrl);
        //return $result;
    }
}