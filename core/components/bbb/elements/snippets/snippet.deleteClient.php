<?php
//$modx->log(xPDO::LOG_LEVEL_ERROR,'Message from deleteClient');
if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
    $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','deleteClient',__FILE__,__LINE__);
}
$id_client = $hook->getValue('id_client');
if($client = $modx->getObject('Clients',array('id_client' => $id_client))){
    $client->remove();
    //все Actions вязанные с этим клиентом удаляются каскадно, поскольку связь - composite. Удобно.
}
return true;
