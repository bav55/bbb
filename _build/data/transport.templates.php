<?php
$templates = array();
$tmp = array(
    'meeting.page.tpl' => array(
        'file' => 'meeting.page',
        'description' => 'Шаблон страницы вебинара',
    ),
    'waitpage.tpl' => array(
        'file' => 'waitpage',
        'description' => 'Шаблон страницы ожидания входа на мероприятие',
    ),
);
foreach ($tmp as $k => $v) {
    /* @avr modTemplate $template */
    $template = $modx->newObject('modTemplate');
    $template->fromArray(array(
        'id' => 0,
        'templatename' => $k,
        'description' => @$v['description'],
        'content' => file_get_contents($sources['source_core'].'/elements/templates/template.'.$v['file'].'.tpl'),
        'static' => BUILD_TEMPLATE_STATIC,
        'source' => 1,
        'static_file' => 'core/components/'.PKG_NAME_LOWER.'/elements/templates/template.'.$v['file'].'.tpl',
    ),'',true,true);
    $templates[] = $template;
}
unset($tmp);
return $templates;