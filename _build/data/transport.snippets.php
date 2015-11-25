<?php

$snippets = array();

$tmp = array(
	'CreateMeeting' => array(
		'file' => 'createMeeting',
		'description' => 'Создание мероприятия',
	),
    'CreateClient' => array(
        'file' => 'createClient',
        'description' => 'Создание контакта',
    ),
    'stripslash' => array(
        'file' => 'stripslash',
        'description' => 'Выполняет stripslashes. Применять при обработке строк, доставаемых из БД',
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