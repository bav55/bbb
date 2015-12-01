
<?php

if ($object->xpdo) {
    /** @var modX $modx */
    $modx =& $object->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modelPath = $modx->getOption('bbb_core_path', null, $modx->getOption('core_path') . 'components/bbb/') . 'model/';
            $modx->addPackage('bbb', $modelPath);
            $manager = $modx->getManager();
            $objects = array(
                'Meetings',
                'Clients',
                'ActionTypes',
                'Actions',
                'MeetingStatus'
            );
            foreach ($objects as $object) {
                $manager->createObjectContainer($object);
            }
            $actiontypes = array(
                'MEETING_IS_CREATED',     //мероприятие запланировано (создано)
                'RECEIVED_REQUEST',         //получена заявка на участие в мероприятии
                'SENT_INVITATION',           //отправлено приглашение
                'MEETING_STARTED',        //мероприятие началось
                'MEETING_ENDED',           //Мероприятие окончилось
                'PAYMENT_RECEIVED',     //Поступил платеж
                'USER_INVOLVED_MEETING',    //Пользователь вошел на мероприятие
                'USER_LEFT_MEETING',            //Пользователь покинул мероприятие
                'USER_SENT_REVIEW'              //Пользователь оставил отзыв
            );
            //здесь надо добавить необходимые записи в справочники!
            foreach($actiontypes  as $field=>$value){
                    if(!$modx->getObject('ActionTypes', array('name'=>$value))){
                            $actiontype = $modx->newObject('ActionTypes',array('name'=>$value));
                            $actiontype->save();
                    }
            }
        break;
        case xPDOTransport::ACTION_UPGRADE:
            $modelPath = $modx->getOption('bbb_core_path', null, $modx->getOption('core_path') . 'components/bbb/') . 'model/';
            $modx->addPackage('bbb', $modelPath);

            $manager = $modx->getManager();
            $objects = array();
            $schemaFile = MODX_CORE_PATH . 'components/bbb/model/schema/bbb.mysql.schema.xml';
            if (is_file($schemaFile)) {
                $schema = new SimpleXMLElement($schemaFile, 0, true);
                if (isset($schema->object)) {
                    foreach ($schema->object as $object) {
                        $objects[] = (string)$object['class'];
                    }
                }
                unset($schema);
            }
            foreach ($objects as $tmp) {
                $table = $modx->getTableName($tmp);
                $sql = "SHOW TABLES LIKE '".trim($table,'`')."'";
                $stmt = $modx->prepare($sql);
                $newTable = true;
                if ($stmt->execute() && $stmt->fetchAll()) {
                    $newTable = false;
                }
                // If the table is just created
                if ($newTable) {
                    $manager->createObjectContainer($tmp);
                } else {
                    // If the table exists
                    // 1. Operate with tables
                    $tableFields = array();
                    $c = $modx->prepare("SHOW COLUMNS IN {$modx->getTableName($tmp)}");
                    $c->execute();
                    while ($cl = $c->fetch(PDO::FETCH_ASSOC)) {
                        $tableFields[$cl['Field']] = $cl['Field'];
                    }
                    foreach ($modx->getFields($tmp) as $field => $v) {
                        if (in_array($field, $tableFields)) {
                            unset($tableFields[$field]);
                            $manager->alterField($tmp, $field);
                        } else {
                            $manager->addField($tmp, $field);
                        }
                    }
                    foreach ($tableFields as $field) {
                        $manager->removeField($tmp, $field);
                    }
                    // 2. Operate with indexes
                    $indexes = array();
                    $c = $modx->prepare("SHOW INDEX FROM {$modx->getTableName($tmp)}");
                    $c->execute();
                    while ($cl = $c->fetch(PDO::FETCH_ASSOC)) {
                        $indexes[$cl['Key_name']] = $cl['Key_name'];
                    }
                    foreach ($modx->getIndexMeta($tmp) as $name => $meta) {
                        if (in_array($name, $indexes)) {
                            unset($indexes[$name]);
                        } else {
                            $manager->addIndex($tmp, $name);
                        }
                    }
                    foreach ($indexes as $index) {
                        $manager->removeIndex($tmp, $index);
                    }
                }
            }
            break;

        case xPDOTransport::ACTION_UNINSTALL:
            // Remove tables if it's need

            $modelPath = $modx->getOption('bbb_core_path', null, $modx->getOption('core_path') . 'components/bbb/') . 'model/';
            $modx->addPackage('bbb', $modelPath);

            $manager = $modx->getManager();
            $objects = array();
            $schemaFile = $modelPath .'schema/bbb.mysql.schema.xml';
            if (is_file($schemaFile)) {
                $schema = new SimpleXMLElement($schemaFile, 0, true);
                if (isset($schema->object)) {
                    foreach ($schema->object as $object) {
                        $objects[] = (string)$object['class'];
                    }
                }
                unset($schema);
            } else {
                $modx->log(modX::LOG_LEVEL_ERROR, 'Could not get classes from schema file.');
            }
            foreach ($objects as $tmp) {
                $manager->removeObjectContainer($tmp);
            }

            break;
    }
}
return true;
