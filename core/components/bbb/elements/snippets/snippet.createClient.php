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
if(isset($_FILES['photo'])){
    $sourceId = $modx -> getOption('bbb_contact_photo_source');
    $source = $modx -> getObject('modMediaSource',$sourceId);
    $source_arr = $source->toArray();
    $uploaddir = $source_arr['properties']['basePath']['value'];
    //сгенерируем уникальное имя файла для загруженной фотографии

     $ext = substr(strrchr($_FILES['photo']['name'], '.'), 1);
     $uploadfile = base_convert(time(), 10, 36).'-'.base_convert(rand(0,2000000000), 10, 36);
     $uploadfile .= '.'.$ext;
    if (copy($_FILES['photo']['tmp_name'], $uploaddir.$uploadfile)){
        $newClient->set('photo', $uploadfile);
    }
}
$newClient->set('id_creator', $modx->user->get('id'));
if ($newClient->save() === false) {
    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
    return false;
}
return true;
?>