<?php
$id_resource =$_POST['id_resource'];
if($resource = $modx -> getObject('modResource',$id_resource)){
    $content_resource = $_POST['content_meeting'];
    $content_resource = strip_tags($content_resource,'<p><a><div><b><i><h4><u><img><blockquote><small><cite><ul><li><ol>');
    // загрузим изображение  и добавим к ресурсу через TV
    if(isset($_FILES['image_meeting'])){
        $sourceId = $modx -> getOption('bbb_meeting_photo_source');
        $source = $modx -> getObject('modMediaSource',$sourceId);
        $source_arr = $source->toArray();
        $uploaddir = $source_arr['properties']['basePath']['value'];
        //сгенерируем уникальное имя файла для загруженного изображения
        $ext = substr(strrchr($_FILES['image_meeting']['name'], '.'), 1);
        $uploadfile = base_convert(time(), 10, 36).'-'.base_convert(rand(0,2000000000), 10, 36);
        $uploadfile .= '.'.$ext;
        if (copy($_FILES['image_meeting']['tmp_name'], $uploaddir.$uploadfile)){
            $resource->setTVValue('image_meeting',$uploaddir.$uploadfile);
        }
    }
    $resource->setContent($content_resource);
    if ($resource->save() === false){
        $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
        $hook->addError('error_message',$modx->error->message);
        return $hook->hasErrors();
    }
    //очистим кэш ресурса
    $modx->runSnippet('clearCacheResource',array('resource' => $resource));
    $results = $modx->cacheManager->generateContext($resource->context_key);
    $modx->context->resourceMap = $results['resourceMap'];
    $modx->context->aliasMap = $results['aliasMap'];
    return true;
}
return false;
