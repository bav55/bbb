<?php

    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            // Назначим ID созданного шаблона настройке bbb_meeting_tpl_id если она пустая
            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_meeting_tpl_id'))) {
                if (!$setting->get('value')) {
                    $meeting_template = $modx->getObject('modTemplate',array('templatename' => 'meeting.page.tpl'));
                    $meeting_template_id =  $meeting_template->id;
                    $setting->set('value',$meeting_template_id);
                    $setting->save();
            // создадим TV - image_meeting и добавим ее к созданному шаблону.
                    $category = $meeting_template->category;
                    $tv_options = array(
                        'name' => 'image_meeting',
                        'caption' => 'Картинка для мероприятия',
                        'type' => 'text',
                        'category' => $category,
                        'description' => 'Картинка, отображаемая на странице мероприятия',
                        'template' => $meeting_template_id
                    );
                    $new_tv = $modx->NewObject('modTemplateVar',$tv_options);
                    if ($new_tv && $new_tv -> save()){
                        $modx->log(modX::LOG_LEVEL_INFO, 'TV is created');
                        // разрешим использование данной TV в созданном шаблоне (через fromArray не заработало
                        // см. https://gist.github.com/splittingred/1332064#file-template-create-class-php-L51
                        // а также http://forums.modx.com/thread/29635/cannot-link-tv-to-template
                        $tv_template = $modx -> newObject('modTemplateVarTemplate');
                        $tv_template -> set('tmplvarid', $new_tv-> id);
                        $tv_template -> set('templateid', $meeting_template_id);
                        $tv_template -> set('rank', 0);
                        if (!($tv_template && $tv_template->save())) {
                            $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
                            return false;
                        }
                    }
                   else{
                       $modx->log(modX::LOG_LEVEL_INFO, 'TV is NOT created');
                   }

                }
            }
            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_template_waitpage'))) {
                if (!$setting->get('value')) {
                    $waitpage_template = $modx->getObject('modTemplate',array('templatename' => 'waitpage.tpl'));
                    $waitpage_template_id =  $waitpage_template->id;
                    $setting->set('value',$waitpage_template_id);
                    $setting->save();
                }
            }
            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_template_contactPage'))) {
                if (!$setting->get('value')) {
                    $contactPage_template = $modx->getObject('modTemplate',array('templatename' => 'contactPage.tpl'));
                    $contactPage_template_id = $contactPage_template->id;
                    $setting->set('value',$contactPage_template_id);
                    $setting->save();
                }
            }
            break;

        case xPDOTransport::ACTION_UPGRADE:
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }