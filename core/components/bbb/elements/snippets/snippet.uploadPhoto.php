<?php
    $allfields = $hook->getValues();
        $oldPhoto = $modx -> user -> Profile -> photo;
    if($allfields['photo']['name']<>""){
    $sourceId = $modx -> getOption('bbb_contact_photo_source');
    $source = $modx -> getObject('modMediaSource',$sourceId);
    $source_arr = $source->toArray();
    $uploaddir = $source_arr['properties']['basePath']['value'];
    //сгенерируем уникальное имя файла для загруженного изображения
    $ext = substr(strrchr($_FILES['photo']['name'], '.'), 1);
    if (($ext == 'jpg') or ($ext == 'png') or ($ext == 'gif') or ($ext == 'jpeg')){
        $uploadfile = base_convert(time(), 10, 36).'-'.base_convert(rand(0,2000000000), 10, 36);
        $uploadfile .= '.'.$ext;
            if (copy($_FILES['photo']['tmp_name'], $uploaddir.$uploadfile)){
                $hook->setValue('photo', $uploaddir.$uploadfile);
                return true;
            }
    }
}
else{
    $hook -> setValue('photo', $oldPhoto);
    return true;
}
