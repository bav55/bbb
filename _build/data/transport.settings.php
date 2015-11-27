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
        'value' => '9',
        'area' => '',
        'description' => 'Корневой для всех мероприятий элемент дерева ресурсов',
    ),
    'contact_photo_source' => array(
        'value' => 0,
        'xtype' => 'modx-combo-source',
        'area' => '',
        'description' => 'Медиа-источник для файлов фотографий контактов',
    ),
    'meeting_tpl_id' => array(
        'value' => '',
        'xtype' => 'modx-combo-template',
        'area' => '',
        'description' => 'Шаблон по умолчанию для страницы вебинара',
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
