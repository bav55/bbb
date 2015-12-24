<?php
$allFormFields = $hook->getValues();
if($allFormFields['email_']!=''){ return false;}        //spam-проверка
$meeting = $modx->getObject('Meetings',array('id_meeting' => $allFormFields['id_meeting']));
foreach($allFormFields['clients'] as $key => $value){
    $client = $modx->getObject('Clients', array('id_client' => $value));
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
    $message = $allFormFields['message'];
    foreach($placeholders as $pkey => $pvalue){
        $message = str_replace($pkey, $pvalue, $message);
    }
    // создадим временный чанк
    $uniqid = uniqid();
    $props = Array();
    $chunk = $modx->newObject('modChunk', array('name' => "{tmp}-{$uniqid}"));
    $chunk->setCacheable(false);
    $output = $chunk->process($props, $message);
/*
     $tmp_array = array(
        'message1' => $allFormFields['message'],
        'message2' => $message,
        'output' => $output,
        'allfields' => $allFormFields,
   );
    $string = print_r($tmp_array, true);
    $modx->log(xPDO::LOG_LEVEL_ERROR,$string);
*/
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
    //и создадим действие SENT_INVITATION
    $actiontype = $modx->getObject('ActionTypes',array('name' => 'SENT_INVITATION'));
    $action = $modx->newObject('Actions', array(
        'id_client' => $client->get('id_client'),
        'id_meeting' => $meeting->get('id_meeting'),
        'id_actiontype' => $actiontype->get('id'),
        'timestamp_action' => time(),
    ));
    if ($action->save()=== false) {
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        return false;
    }
    unset($client);
} // перейдем к следующему контакту
return true;

