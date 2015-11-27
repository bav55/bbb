<?php

    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            //***
            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_meeting_tpl_id'))) {
                if (!$setting->get('value')) {
                    $meeting_template = $modx->getObject('modTemplate',array('templatename' => 'meeting.page.tpl    '));
                    $metting_tempalte_id =  $meeting_template->id;
                    $setting->set('value',$metting_tempalte_id);
                    $setting->save();
                }
            }
            break;

        case xPDOTransport::ACTION_UPGRADE:
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }