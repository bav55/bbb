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
            /* @var $source modMediaSource */
            if (!$source = $modx->getObject('modMediaSource', array('name' => $properties['name']))) {
                $source = $modx->newObject('modMediaSource', $properties);
            }
            else {
                $default = $source->get('properties');
                foreach ($properties['properties'] as $k => $v) {
                    if (!array_key_exists($k, $default)) {
                        $default[$k] = $v;
                    }
                }
                $source->set('properties', $default);
            }
            if($source->save()){
                $modx->log(modX::LOG_LEVEL_ERROR, 'MediaSource is SAVED');
            }
            else{
                $modx->log(modX::LOG_LEVEL_ERROR, 'MediaSource is NOT saved');
            }
            if ($setting = $modx->getObject('modSystemSetting', array('key' => 'bbb_contact-photo-source'))) {
                if (!$setting->get('value')) {
                    $setting->set('value', $source->get('id'));
                    $setting->save();
                }
            }
            @mkdir(MODX_ASSETS_PATH . 'contact-images/');
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }

return true;