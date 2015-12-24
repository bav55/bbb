<?php
// actiontype = RECEIVED_REQUEST
//
//$modx->log(xPDO::LOG_LEVEL_ERROR,'message from receivedRequest!');
$allFormFields = $hook->getValues();
if($allFormFields['email_']!=''){ return false;}        //spam-проверка
$actiontype = $modx->getObject('ActionTypes',array('name'=>'RECEIVED_REQUEST'));
//проверим есть ли на сайте такой контакт у этого ведущего
if($client = $modx->getObject('Clients', array('id_creator' => $allFormFields['id_creator'], 'email' => $allFormFields['email']))){
        //контакт найден, берем его id_client
    $id_client = $client->get('id_client');
}
else{
    //контак не найден - создадим нового
    $client = $modx->newObject('Clients');
    foreach ($allFormFields as $field=>$value){
        if ($field !== 'email_' && $field !== 'receivedRequest-submit')
            $client -> set($field, $value);
    }
    if($client->save() === false){
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        return false;
    }
    $id_client = $client->get('id_client'); //id созданного контакта
}
    $action = $modx->newObject('Actions',array(
    'id_actiontype' => $actiontype->get('id'),
    'id_client' =>  $id_client,
    'id_meeting' =>  $allFormFields['id_meeting'],
    'timestamp_action' => time(),
));
if($action->save() === false){
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
sleep(1);
$meeting = $modx->getObject('Meetings',array('id_meeting' =>$allFormFields['id_meeting'] ));
//если мероприятие бесплатное, сразу отправим приглашение пользователю.
if($meeting->get('cost') == 0){ // мероприятие бесплатное
    //автоматически отправим приглашение подавшему заявку
    $placeholders = array(
        '%firstname%' => $client->get('firstname'),
        '%lastname%' => $client->get('lastname'),
        '%name_meeting%' => $meeting->get('name_meeting'),
        '%date_meeting%' => date('d.m.Y, H:i',strtotime($meeting->get('date_meeting'))),
        '%duration%' => $meeting->get('duration'),
        '%page_meeting%' => $modx->getOption('site_url').$modx->makeUrl($meeting->get('id_resource')),
        '%link_meeting%' => $modx->runSnippet('getJoinMeetingUrl',array(
                    'id_meeting' => $meeting->get('id_meeting'),
                    'id_client' => $client->get('id_client'),
                    'user_type' => 'attendee',
                    'id_waitpage' => $modx->getOption('bbb_id_waitpage'),
                )
            ),
        '%email_creator%' => $modx->user->Profile->email,
        '%fullname_creator%' => $modx->user->Profile->fullname,
        '%br%' => '<br>',
    );
        $profile = $modx->user->Profile;
        $extended = $profile->get('extended');
        $message = $extended['invitation_template'];
    foreach($placeholders as $pkey => $pvalue){
        $message = str_replace($pkey, $pvalue, $message);
    }
    // создадим временный чанк
    $uniqid = uniqid();
    $props = Array();
    $chunk = $modx->newObject('modChunk', array('name' => "{tmp}-{$uniqid}"));
    $chunk->setCacheable(false);
    $output = $chunk->process($props, $message);
    //готово сообщение для пользователя.
    //отправим письмо клиенту
    $modx->getService('mail', 'mail.modPHPMailer');
    $modx->mail->set(modMail::MAIL_BODY,$output);
    $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
    $modx->mail->set(modMail::MAIL_FROM_NAME,$modx->user->Profile->fullname);
    $modx->mail->set(modMail::MAIL_SUBJECT,'Приглашение на мероприятие "'.$meeting->get('name_meeting').'"');
    $modx->mail->address('to',$client->get('email'));
    $modx->mail->address('reply-to',$modx->user->Profile->email);
    $modx->mail->setHTML(true);
    if (!$modx->mail->send()) {
        $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
        return false;
    }
    $modx->mail->reset();
    //***************************************************
    $actiontype = $modx->getObject('ActionTypes',array('name'=>'SENT_INVITATION'));
    $action = $modx->newObject('Actions',array(
        'id_actiontype' => $actiontype->get('id'),
        'id_client' =>  $id_client,
        'id_meeting' =>  $allFormFields['id_meeting'],
        'timestamp_action' => time(),
    ));
    if($action->save() === false){
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        return false;
    }
}
return true;