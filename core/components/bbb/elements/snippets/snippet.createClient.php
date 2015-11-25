<?php
/*
 * Данный сниппет createClient будет использоваться как hook для FormIt - создавать новый контакт после заполнения формы
 */
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','createNewClient',__FILE__,__LINE__);
}
$newClient = $modx->newObject('Clients');
$allFormFields = $hook->getValues();
$allFormFields = $_POST;

if($allFormFields['email_']!=''){ return false;}        //spam-проверка

foreach ($allFormFields as $field=>$value){
    if ($field !== 'email_' && $field !== 'submit' && $field !=='photo'){
        if (is_string($value)){
            $value = addslashes(trim($value));
        }
        $newClient-> set($field, $value);
    }
}

// загрузим фото клиента и путь к фотографии добавим в параметры объекта
$sourceId = $modx -> getOption('contact-photo-source');
$source = $modx -> getObject('modMediaSource',$sourceId);
$uploaddir = $source -> getBasePath($source);
$uploadfile = $uploaddir.basename($_FILES['photo']['name']);
// Копируем файл из каталога для временного хранения файлов:
if (!copy($_FILES['uploadfile']['tmp_name'], $uploadfile))
{
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}

$newClient->set('photo', $_FILES['photo']['name']);
$newClient->set('id_creator', $modx->user->get('id'));

if ($newClient->save() === false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
//print_r($newClient->toArray());
return true;
?>