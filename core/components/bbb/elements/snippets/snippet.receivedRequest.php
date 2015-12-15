<?php
// actiontype = RECEIVED_REQUEST
//
//$modx->log(xPDO::LOG_LEVEL_ERROR,'message from receivedRequest!');
$allFormFields = $hook->getValues();
if($allFormFields['email_']!=''){ return false;}        //spam-проверка
$actiontype = $modx->getObject('ActionTypes',array('name'=>'RECEIVED_REQUEST'));
//проверим есть ли на сайте такой контакт у этого ведущего
if($contact = $modx->getObject('Clients', array('id_creator' => $allFormFields['id_creator'], 'email' => $allFormFields['email']))){
        //контакт найден, берем его id_client
    $id_client = $contact->get('id_client');
}
else{
    //контак не найден - создадим нового
    $contact = $modx->newObject('Clients');
    foreach ($allFormFields as $field=>$value){
        if ($field !== 'email_' && $field !== 'receivedRequest-submit')
            $contact -> set($field, $value);
    }
    if($contact->save() === false){
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        return false;
    }
    $id_client = $contact->get('id_client'); //id созданного контакта
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
//если мероприятие бесплатное, сразу отправим приглашение пользователю. (пока  - эмуляция)
$meeting = $modx->getObject('Meetings',array('id_meeting' =>$allFormFields['id_meeting'] ));
if($meeting->get('paid') == 0){ // мероприятие бесплатное
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