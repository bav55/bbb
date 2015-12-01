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
        break;

    case xPDOTransport::ACTION_UPGRADE:
        break;

    case xPDOTransport::ACTION_UNINSTALL:
        break;
}