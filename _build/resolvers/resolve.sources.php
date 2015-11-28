<?php
/**
 * Resolve creating media sources
 *
 * @var xPDOObject $object
 * @var array $options
 */
//if ($object->xpdo) {
    /* @var modX $modx */
    $modx =& $object->xpdo;
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
        case xPDOTransport::ACTION_UPGRADE:
            $tmp = explode('/', MODX_ASSETS_URL);
            $assets = $tmp[count($tmp) - 2];
            $properties = array(
                'name' => 'bbb contact Images'
            ,'description' => 'Путь для сохранения фотографий контактов'
            ,'class_key' => 'sources.modFileMediaSource'
            ,'properties' => array(
                    'basePath' => array(
                        'name' => 'basePath','desc' => 'prop_file.basePath_desc','type' => 'textfield','lexicon' => 'core:source',
                        'value' => $assets . '/contact-images/',
                    ),
                    'baseUrl' => array(
                        'name' => 'baseUrl','desc' => 'prop_file.baseUrl_desc','type' => 'textfield','lexicon' => 'core:source',
                        'value' => 'assets/contact-images/',
                    ),
                    'imageExtensions' => array(
                        'name' => 'imageExtensions','desc' => 'prop_file.imageExtensions_desc','type' => 'textfield','lexicon' => 'core:source',
                        'value' => 'jpg,jpeg,png,gif',
                    ),
                    'allowedFileTypes' => array(
                        'name' => 'allowedFileTypes','desc' => 'prop_file.allowedFileTypes_desc','type' => 'textfield','lexicon' => 'core:source',
                        'value' => 'jpg,jpeg,png,gif',
                    ),
                    'thumbnailType' => array(
                        'name' => 'thumbnailType','desc' => 'prop_file.thumbnailType_desc','type' => 'list','lexicon' => 'core:source',
                        'options' => array(
                            array('text' => 'Png','value' => 'png'),
                            array('text' => 'Jpg','value' => 'jpg')
                        ),
                        'value' => 'jpg',
                    ),
                    'maxUploadWidth' => array(
                        'name' => 'maxUploadWidth','desc' => '','type' => 'numberfield',
                        'value' => 640,
                    ),
                    'maxUploadHeight' => array(
                        'name' => 'maxUploadHeight','desc' => '','type' => 'numberfield',
                        'value' => 480,
                    ),
                    'maxUploadSize' => array(
                        'name' => 'maxUploadSize','desc' => '','type' => 'numberfield',
                        'value' => 10485760,
                    ),

                )
            ,'is_stream' => 1
            );
            /* @var $sourceContact modMediaSource */
            if (!$sourceContact = $modx->getObject('modMediaSource', array('name' => $properties['name']))) {
                $sourceContact = $modx->newObject('modMediaSource', $properties);
            }
            else {
                $default = $sourceContact->get('properties');
                foreach ($properties['properties'] as $k => $v) {
                    if (!array_key_exists($k, $default)) {
                        $default[$k] = $v;
                    }
                }
                $sourceContact->set('properties', $default);
            }
            if($sourceContact->save()){
                $modx->log(modX::LOG_LEVEL_INFO, 'MediaSource is SAVED');
            }
            else{
                $modx->log(modX::LOG_LEVEL_INFO, 'MediaSource is NOT saved');
            }
            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_contact_photo_source'))) {
                if (!$setting->get('value')) {
                    $setting->set('value', $sourceContact->get('id'));
                    $setting->save();
                }
            }
            $properties2 = $properties;
            $properties2['properties']['basePath']['value'] =  $assets . '/meeting-images/';
            $properties2['properties']['baseUrl']['value'] =  'assets/meeting-images/';
            $properties2['name'] =   'bbb meeting Images';
            $properties2['description'] =  'Путь для сохранения фотографий мероприятий';
            // ---
        /* @var $sourceContact modMediaSource */
        if (!$sourceMeeting= $modx->getObject('modMediaSource', array('name' => $properties2['name']))) {
            $sourceMeeting = $modx->newObject('modMediaSource', $properties2);
        }
        else {
            $default = $sourceMeeting->get('properties');
            foreach ($properties2['properties'] as $k => $v) {
                if (!array_key_exists($k, $default)) {
                    $default[$k] = $v;
                }
            }
            $sourceMeeting->set('properties', $default);
        }
        if($sourceMeeting->save()){
            $modx->log(modX::LOG_LEVEL_INFO, 'MediaSource2 is SAVED');
        }
        else{
            $modx->log(modX::LOG_LEVEL_INFO, 'MediaSource2 is NOT saved');
        }
        if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_meeting_photo_source'))) {
            if (!$setting->get('value')) {
                $setting->set('value', $sourceMeeting->get('id'));
                $setting->save();
            }
        }
            // ---
            @mkdir(MODX_ASSETS_PATH . 'contact-images/');
            @mkdir(MODX_ASSETS_PATH . 'meeting-images/');
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }

return true;