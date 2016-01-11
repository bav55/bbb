<?php

$chunks = array();

$tmp = array(
    'tpl.form.new.meeting' => array(
        'file' => 'form.new.meeting',
        'description' => 'Форма создания нового мероприятия',
    ),
    'tpl.form.new.meeting.modal' => array(
        'file' => 'form.new.meeting.modal',
        'description' => 'Обертка формы для создания модального окна добавления мероприятия',
    ),
    'tpl.form.new.client' => array(
        'file' => 'form.new.client',
        'description' => 'Форма создания нового контакта',
    ),
    'tpl.form.new.client.modal' => array(
        'file' => 'form.new.client.modal',
        'description' => 'Обертка формы для создания модального окна добавления контакта',
    ),
    'tpl.form.request' => array(
        'file' => 'form.request',
        'description' => 'Форма подачи заявки на мероприятие',
    ),
    'tpl.meeting.info' => array(
        'file' => 'meeting.info',
        'description' => 'Информация о мероприятии на его странице',
    ),
    'tpl.meeting.edit.content' => array(
        'file' => 'meeting.edit.content',
        'description' => 'Редактирование контента о мероприятии',
    ),
    'tpl.form.edit.meeting.modal' => array(
        'file' => 'form.edit.meeting.modal',
        'description' => 'Обертка формы для создания модального окна редактирования данных о мероприятии',
    ),
    'tpl.modal.form' => array(
        'file' => 'modal.form',
        'description' => 'Общая обертка формы для создания модального окна. Мысль хорошая, но пока не заработал, уперся в memory_limit',
    ),
    'actions.item.tpl' => array(
        'file' => 'actions.item',
        'description' => 'строка вывода Действия (в списке)',
    ),
    'meeting.item.tpl' => array(
        'file' => 'meeting.item',
        'description' => 'строка вывода мероприятия (в списке)',
    ),
    'client.check.item.tpl' => array(
        'file' => 'client.check.item',
        'description' => 'Оформление контакта в форме отправки приглашений или сообщений (с чекбоксом)',
    ),
    'tpl.form.sent.invitation.tpl' => array(
        'file' => 'form.sent.invitation',
        'description' => 'Форма отправки приглашений на мероприятие',
    ),
    'invitation.template.tpl' => array(
        'file' => 'invitation.template',
        'description' => 'Содержание письма-приглашения на мероприятие (по умолчанию)',
    ),
    'message.template.tpl' => array(
        'file' => 'message.template',
        'description' => 'Содержание письма рассылки контакту (по умолчанию)',
    ),
    'form.leave.feedback' => array(
        'file' => 'form.leave.feedback',
        'description' => 'Форма отправки отзыва об участии в мероприятии',
    ),
    'clients.item.tpl' => array(
        'file' => 'clients.item',
        'description' => 'Строка представления контакта в "Мои контакты"',
    ),
    'actions.contact.item.tpl' => array(
        'file' => 'actions.contact.item',
        'description' => 'Строка представления действия  в "Информация по контакту"',
    ),
    'client.info.tpl' => array(
        'file' => 'client.info',
        'description' => 'Сведения о контакте  в "Информация по контакту"',
    ),
    'form.edit.client.modal.tpl' => array(
        'file' => 'form.edit.client.modal',
        'description' => 'Обертка формы для создания модального окна редактирования данных о контакте',
    ),
    'page.payment.tpl' => array(
        'file' => 'page.payment',
        'description' => 'Чанк оформления страницы оплаты участия в мероприятии',
    ),
    'needPay.email.tpl' => array(
        'file' => 'needPay.email',
        'description' => 'Чанк оформления письма об оплате участнику платного мероприятия',
    ),
    'tpl.form.register' => array(
        'file' => 'form.register',
        'description' => 'Чанк оформления формы регистрации ведущего (автора) на сайте',
    ),
    'tpl.form.login' => array(
        'file' => 'form.login',
        'description' => 'Чанк оформления формы входа  ведущего (автора) на сайте',
    ),
    'all-meetings.item.tpl' => array(
        'file' => 'all-meetings.item',
        'description' => 'Чанк оформления мероприятия в каталоге ВСЕХ мероприятих',
    ),
    'author.tpl' => array(
        'file' => 'author',
        'description' => 'Чанк оформления Страницы каждого ведущего',
    ),
    'all-authors.item.tpl' => array(
        'file' => 'all-authors.item',
        'description' => 'Чанк оформления каждого автора в каталоге авторов-ведущих',
    ),
    'new_meetings.tpl' => array(
        'file' => 'new_meetings',
        'description' => 'Чанк оформления блока Ближайшие события на главной странице',
    ),
    'tpl.request.email' => array(
        'file' => 'tpl.request.email',
        'description' => 'Чанк оформления email-уведомления ведущему о поступившей заявке',
    ),
);

// Save chunks for setup options
$BUILD_CHUNKS = array();

foreach ($tmp as $k => $v) {
	/* @avr modChunk $chunk */
	$chunk = $modx->newObject('modChunk');
	$chunk->fromArray(array(
		'id' => 0,
		'name' => $k,
		'description' => @$v['description'],
		'snippet' => file_get_contents($sources['source_core'] . '/elements/chunks/chunk.' . $v['file'] . '.tpl'),
		'static' => BUILD_CHUNK_STATIC,
		'source' => 1,
		'static_file' => 'core/components/' . PKG_NAME_LOWER . '/elements/chunks/chunk.' . $v['file'] . '.tpl',
	), '', true, true);

	$chunks[] = $chunk;

	$BUILD_CHUNKS[$k] = file_get_contents($sources['source_core'] . '/elements/chunks/chunk.' . $v['file'] . '.tpl');
}

unset($tmp);
return $chunks;