<?php
/*
$modx->log(xPDO::LOG_LEVEL_ERROR,'Message from editClient');
return true;
*/
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','editClient',__FILE__,__LINE__);
}
$allFormFields = $hook->getValues();

/*$string = print_r($allFormFields, true);
$modx->log(xPDO::LOG_LEVEL_ERROR,$string);
*/
if($Client = $modx->getObject('Clients', array('id_client' => $allFormFields['id_client']))){
    if($allFormFields['email_']!=''){ return false;}        //spam-проверка
    foreach ($allFormFields as $field=>$value){
        if ($field !== 'email_' && $field !== 'editClient-submit' && $field !== 'button' && $field !== 'photo' ){
            if (is_string($value)){
                $value = trim($value);
            }
            $Client-> set($field, $value);
        }
    }
    //если обновилась фотография контакта, обработаем этот случай
    if(isset($_FILES['photo'])){
        $sourceId = $modx -> getOption('bbb_contact_photo_source');
        $source = $modx -> getObject('modMediaSource',$sourceId);
        $source_arr = $source->toArray();
        $uploaddir = $source_arr['properties']['basePath']['value'];
        //сгенерируем уникальное имя файла для загруженного изображения
        $ext = substr(strrchr($_FILES['photo']['name'], '.'), 1);
        $uploadfile = base_convert(time(), 10, 36).'-'.base_convert(rand(0,2000000000), 10, 36);
        $uploadfile .= '.'.$ext;
        if (copy($_FILES['photo']['tmp_name'], $uploaddir.$uploadfile)){
            $Client-> set('photo', $uploaddir.$uploadfile);
            $modx->log(xPDO::LOG_LEVEL_ERROR,'photo='.$Client->get('photo'));
        }
    }
       if ($Client->save() === false) {
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        return false;
    }
    return true;
}
else{
    return false;
}