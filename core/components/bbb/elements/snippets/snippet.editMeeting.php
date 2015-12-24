<?php
/*
$modx->log(xPDO::LOG_LEVEL_ERROR,'Message from editMeeting');
return true;
*/
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','editMeeting',__FILE__,__LINE__);
}
$allFormFields = $hook->getValues();

if($Meeting = $modx->getObject('Meetings', array('id_meeting' => $allFormFields['id_meeting']))){
    if($allFormFields['email_']!=''){ return false;}        //spam-проверка
    //правильно обработаем чекбоксы, чтобы в базе верно происходило обновление
    if(!isset($allFormFields['record'])){ $allFormFields['record'] = 0; }
    if(!isset($allFormFields['cost'])){ $allFormFields['cost'] = 0; }
    /*
            //--- для отладки удобно print_r выводить в виде строки
    $string = print_r($allFormFields, true);
    $modx->log(xPDO::LOG_LEVEL_ERROR,$string);
            //---
    */
    foreach ($allFormFields as $field=>$value){
        if ($field !== 'email_' && $field !== 'editMeeting-submit' && $field !== 'button' ){
            if (is_string($value)){
                $value = trim($value);
            }
            $Meeting-> set($field, $value);
        }
    }
    if ($Meeting->save() === false) {
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        return false;
    }
    else{
        //обновить pagetitle у связанного ресурса
        $resource = $modx->getObject('modResource',array('id' => $Meeting->get('id_resource')));
        $resource->set('pagetitle',$Meeting->get('name_meeting'));
        $resource->save();
        $modx->runSnippet('clearCacheResource',array('resource' => $resource));
        return true;
    }
}
else{
    return false;
}