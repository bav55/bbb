<?php
/*
 * Данный сниппет addNewMeeting будет использоваться как hook для FormIt - создавать новое мероприятие после заполнения формы
 */
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','createNewMeeting',__FILE__,__LINE__);
}
$newMeeting = $modx->newObject('Meetings');
$allFormFields = $hook->getValues();
$allFormFields = $_POST;

if($allFormFields['email_']!=''){ return false;}        //spam-проверка

foreach ($allFormFields as $field=>$value){
    if ($field !== 'email_' && $field !== 'submit'){
        if (is_string($value)){
            $value = addslashes(trim($value));
        }
        $newMeeting-> set($field, $value);
    }
}
$newMeeting->set('id_creator', $modx->user->get('id'));
if ($newMeeting->save() === false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
//print_r($newMeeting->toArray());
return true;
?>