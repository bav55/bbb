<?php

$snippets = array();

$tmp = array(
	'createMeeting' => array(
		'file' => 'createMeeting',
		'description' => 'Создание мероприятия',
	),
    'createClient' => array(
        'file' => 'createClient',
        'description' => 'Создание контакта',
    ),
    'stripslash' => array(
        'file' => 'stripslash',
        'description' => 'Выполняет stripslashes. Применять при обработке строк, доставаемых из БД',
    ),
    'editMeeting' => array(
        'file' => 'editMeeting',
        'description' => 'Редактирование данных о мероприятии',
    ),
    'editContentMeeting' => array(
        'file' => 'editContentMeeting',
        'description' => 'Редактирование описания мероприятия (связанный ресурс)',
    ),
    'receivedRequest' => array(
        'file' => 'sendRequest',
        'description' => 'Обработка заявки на участие в мероприятии',
    ),
    'clearCacheResource' => array(
        'file' => 'clearCacheResource',
        'description' => 'Очищает кэш ресурса после обновления, не затрагивая кэш всего сайта',
    ),
    'sentInvitation' => array(
        'file' => 'sentInvitation',
        'description' => 'Отправляет приглашение контактам',
    ),
    'startMeeting' => array(
        'file' => 'startMeeting',
        'description' => 'Создает мероприятие на сервере BigBlueButton и возвращает ссылку на вход для ведущего',
    ),
    'getJoinMeetingUrl' => array(
        'file' => 'getJoinMeetingUrl',
        'description' => 'Возвращает ссылку на вход в мероприятие для со-ведущего или участника (см. параметры сниппета)',
    ),
    'endMeeting' => array(
        'file' => 'endMeeting',
        'description' => 'Завершает мероприятие в откидывает всех активных пользователей',
    ),
    'getUrlParam' => array(
        'file' => 'getUrlParam',
        'description' => 'Сниппет позволяет получить значения параметров из GET-массива',
    ),

);

foreach ($tmp as $k => $v) {
	/* @avr modSnippet $snippet */
	$snippet = $modx->newObject('modSnippet');
	$snippet->fromArray(array(
		'id' => 0,
		'name' => $k,
		'description' => @$v['description'],
		'snippet' => getSnippetContent($sources['source_core'] . '/elements/snippets/snippet.' . $v['file'] . '.php'),
		'static' => BUILD_SNIPPET_STATIC,
		'source' => 1,
		'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/snippets/snippet.' . $v['file'] . '.php',
	), '', true, true);

	$properties = include $sources['build'] . 'properties/properties.' . $v['file'] . '.php';
	$snippet->setProperties($properties);

	$snippets[] = $snippet;
}

unset($tmp, $properties);
return $snippets;