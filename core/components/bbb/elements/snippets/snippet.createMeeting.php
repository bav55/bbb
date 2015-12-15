<?php
/*
 * Данный сниппет createMeeting будет использоваться как hook для FormIt - создавать новое мероприятие после заполнения формы
 */
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','createMeeting',__FILE__,__LINE__);
}
$newMeeting = $modx->newObject('Meetings');
$allFormFields = $hook->getValues();

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
// создадим новый ресурс - страницу для создаваемого вебинара
$newResource = $modx->newObject('modResource');
$alias = $newResource->cleanAlias($newMeeting->get('name_meeting'));
$alias .= '-'.$newMeeting->get('id_meeting');
$resource_settings = array(
    'pagetitle' => $newMeeting->get('name_meeting'),
    'parent' => $modx->getOption('bbb_root_meeting_id'),
    'template' => $modx->getOption('bbb_meeting_tpl_id'),
    'alias' => $alias,
    'published' => true,
);
$newResource->fromArray($resource_settings);
if ($newResource->save() === false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
// ID созданного ресурса пропишем в свойствах мероприятия
$newMeeting->set('id_resource',  $newResource->get('id'));
if ($newMeeting->save() === false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}

//print_r($newMeeting->toArray());
return true;
?>