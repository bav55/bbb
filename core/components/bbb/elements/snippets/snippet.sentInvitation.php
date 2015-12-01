<?php
$allFormFields = $hook->getValues();
if($allFormFields['email_']!=''){ return false;}        //spam-проверка
$string = print_r($allFormFields, true);
$modx->log(xPDO::LOG_LEVEL_ERROR,$string);