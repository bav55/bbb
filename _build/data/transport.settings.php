<?php

$settings = array();

$tmp = array(
    'config_security_salt' => array(
        'xtype' => 'textfield',
        'value' => '6a5e9d7456552d0f78cfb57575c7b418',
        'area' => ''
    ),
    'config_server_base_url' => array(
        'xtype' => 'textfield',
        'value' => 'http://web-meeting.ru/bigbluebutton/',
        'area' => ''
    ),
    'root_meeting_id' => array(
        'xtype' => 'textfield',
        'value' => '',
        'area' => '',
        'description' => 'Корневой для всех мероприятий элемент дерева ресурсов',
    ),
    'id_waitpage' => array(
        'xtype' => 'textfield',
        'value' => '',
        'area' => '',
        'description' => 'modResource.id страницы входа на мероприятие (ожидание входа, пока не начнется мероприятие)',
    ),
    'contact_photo_source' => array(
        'value' => 0,
        'xtype' => 'modx-combo-source',
        'area' => '',
        'description' => 'Медиа-источник для файлов фотографий контактов',
    ),
    'meeting_photo_source' => array(
        'value' => 0,
        'xtype' => 'modx-combo-source',
        'area' => '',
        'description' => 'Медиа-источник для файлов фотографий мероприятий',
    ),
    'meeting_tpl_id' => array(
        'value' => '',
        'xtype' => 'modx-combo-template',
        'area' => '',
        'description' => 'Шаблон по умолчанию для страницы вебинара',
    ),
    'template_waitpage' => array(
        'value' => '',
        'xtype' => 'modx-combo-template',
        'area' => '',
        'description' => 'Шаблон по умолчанию для страницы ожидания входа на мероприятие',
    ),
    'sentInvitation_page_id' => array(
        'value' => '',
        'xtype' => 'textfield',
        'area' => '',
        'description' => 'ID ресурса - страницы для отправки приглашений на мероприятие',
    ),
    'leaveFeedback_page_id' => array(
        'value' => '',
        'xtype' => 'textfield',
        'area' => '',
        'description' => 'ID ресурса - страницы для отправки отзыва об участии в мероприятии',
    ),
    /*
	'some_setting' => array(
		'xtype' => 'combo-boolean',
		'value' => true,
		'area' => 'bbb_main',
	),
	*/
);

foreach ($tmp as $k => $v) {
	/* @var modSystemSetting $setting */
	$setting = $modx->newObject('modSystemSetting');
	$setting->fromArray(array_merge(
		array(
			'key' => 'bbb_' . $k,
			'namespace' => PKG_NAME_LOWER,
		), $v
	), '', true, true);

	$settings[] = $setting;
}

unset($tmp);
return $settings;
