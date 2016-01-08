<?php

/** @var modX $modx */
$modx =& $object->xpdo;

switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
        $resources = array();
        $tmp = array(
            'meeting_root' => array(
                'pagetitle' => 'Мероприятия',
                'description' => 'Корневой контейнер для всех создаваемых мероприятий (их связанных ресурсов)',
                'isfolder' => 1,
                'published' => 1,
                'hidemenu' => 1,
                'show_in_tree' => 1,
                'alias' => 'meetings',
            ),
            'waitpage' => array(
                'pagetitle' => 'Страница входа на мероприятие',
                'description' => 'страница, куда попадают все участники и ведущии (кроме организатора) перед началом мероприятия.',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 1,
                'show_in_tree' => 1,
                'alias' => 'entry-to-the-meeting',
            ),
            'sentInvitationPage' => array(
                'pagetitle' => 'Отправка приглашений на мероприятие',
                'description' => 'Страница с формой отправки приглашений на мероприятие',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 1,
                'show_in_tree' => 1,
                'alias' => 'sent-invitation',
            ),
            'leaveFeedback' => array(
                'pagetitle' => 'Оставить отзыв об участии в мероприятии',
                'description' => 'Страница с формой отправки отзыва об участии в мероприятии',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 1,
                'show_in_tree' => 1,
                'alias' => 'leave-feedback',
            ),
            'contactPage' => array(
                'pagetitle' => 'Информация о контакте',
                'description' => 'Страница с информацией о контакте',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 1,
                'show_in_tree' => 1,
                'alias' => 'contact-info',
            ),
            'myContactsPage' => array(
                'pagetitle' => 'Мои контакты',
                'description' => 'Страница личного кабинета - Мои контакты',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 0,
                'show_in_tree' => 1,
                'alias' => 'my-contacts',
            ),
            'myMeetingsPage' => array(
                'pagetitle' => 'Мои мероприятия',
                'description' => 'Страница личного кабинета - Мои мероприятия',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 0,
                'show_in_tree' => 1,
                'alias' => 'my-meetings',
            ),
            'mySettingsPage' => array(
                'pagetitle' => 'Мои наcтройки',
                'description' => 'Страница личного кабинета - Мои настройки',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 0,
                'show_in_tree' => 1,
                'alias' => 'my-settings',
            ),
            'editMySettingsPage' => array(
                'pagetitle' => 'Редактирование моих настроек',
                'description' => 'Страница личного кабинета - Редактирование профиля ведущего',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 0,
                'show_in_tree' => 1,
                'alias' => 'update-profile',
            ),
            'paymentPage' => array(
                'pagetitle' => 'Оплата участия в мероприятии',
                'description' => 'Страница для оплаты участия в мероприятии',
                'isfolder' => 0,
                'published' => 1,
                'hidemenu' => 1,
                'show_in_tree' => 1,
                'alias' => 'pay',
            ),
        );
        foreach ($tmp as $k => $v) {
            /* @var modResource $resource */
            $path = $modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/');
            if(!$res = $modx->getObject('modResource',array('pagetitle' => @$v['pagetitle']))){
                $resource = $modx->newObject('modResource');
                $resource->fromArray(array(
                    'pagetitle' => @$v['pagetitle'],
                    'description' => @$v['description'],
                    'content' => file_get_contents($path.'elements/resources/resource.'.$k.'.tpl'),
                    'isfolder' => @$v['isfolder'],
                    'published' => @$v['published'],
                    'hidemenu' => @$v['hidemenu'],
                    'show_in_tree' => @$v['show_in_tree'],
                    'alias' => @$v['alias'],
                ),'',true,true);
                if(!isset($v['alias'])) $resource->set('alias',$resource->cleanAlias($resource->get('pagetitle')));
                $resource->save();
            }
        }
        unset($tmp);

        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_id_waitpage'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Страница входа на мероприятие'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_root_meeting_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Мероприятия'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_sentInvitation_page_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Отправка приглашений на мероприятие'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_leaveFeedback_page_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Оставить отзыв об участии в мероприятии'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_contactPage_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Информация о контакте'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
                }
        }
        if ($template = $modx->getObject('modSystemSetting', array('key' => 'bbb_template_contactPage'))) {
            $resource = $modx->getObject('modResource',array('pagetitle' => 'Информация о контакте'));
            $resource->set('template', $template->get('value'));
            $modx->log(modX::LOG_LEVEL_ERROR, 'template_id='.$template->get('value'));
            $resource->save();
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_my_contacts_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Мои контакты'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_my_meetings_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Мои мероприятия'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_my_settings_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Мои наcтройки'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_payment_id'))) {
            if (!$setting->get('value')) {
                $resource = $modx->getObject('modResource',array('pagetitle' => 'Оплата участия в мероприятии'));
                $setting->set('value', $resource->get('id'));
                $setting->save();
            }
        }
        if ($template = $modx->getObject('modTemplate', array('templatename' => 'paymentPage.tpl'))) {
            $resource = $modx->getObject('modResource',array('pagetitle' => 'Оплата участия в мероприятии'));
            $resource->set('template', $template->get('id'));
            $resource->save();
        }


        break;

    case xPDOTransport::ACTION_UPGRADE:
        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}