<?php
switch ($modx->event->name) {
    case 'OnUserSave':
        if(!$bbb = $modx->getService('bbb','bbb',$modx->getOption('bbb_core_path',null,$modx->getOption('core_path').'components/bbb/').'model/bbb/')){
            $modx->log(xPDO::LOG_LEVEL_ERROR,'Ошибка! Не удается проинициализировать bbb.','','plugin - bbb',__FILE__,__LINE__);
        }
        // Сохраняем дату создания нового пользователя
        if ($user && $mode == 'new') {
            if ($profile = $user->getOne('Profile')) {
                $extended = $profile->get('extended');
                $extended['registered'] = date('d.m.Y H:i:s'); //в этой настройке будем хранить дату и время регистрации пользователя
                //Ниже - добавим шаблоны для приглашения и рассылки по умолчанию
                $invitation = $modx->getObject('modChunk', array("name" => "invitation.template.tpl"));
                $message = $modx->getObject('modChunk', array("name" => "message.template.tpl"));
                $extended['invitation_template'] = $invitation->get('content');
                $extended['message_template'] = $message->get('content');
                $extended['YandexMoney'] = '';
                //создадим автоматически первого клиента для этого ведущего - его самого.
                $client = $modx->newObject('Clients', array(
                    'id_creator' => $user->id,
                    'firstname' => $user->Profile->fullname,
                    'email' => $user->Profile->email,
                ));
                if ($client->save()=== false) {
                    $modx->log(xPDO::LOG_LEVEL_ERROR,$modx->error->message);
                    return false;
                }
                $extended['id_client'] = $client->get('id_client');
                $profile->set('extended', $extended);
                $profile->save();
                //пришла идея - реализовать здесь отправку сообщения администратору сайта о новой регистрации (на адрес Планфикса)
                $message = 'username: '.$user->Profile->email;
                $message .= '<br>ФИО:'.$user->Profile->fullname;
                $message .= '<br>email:'.$user->Profile->email;
                $message .= '<br>date:'.date('d.m.Y H:i:s');
                $uniqid = uniqid();
                $props = Array();
                $chunk = $modx->newObject('modChunk', array('name' => "{tmp}-{$uniqid}"));
                $chunk->setCacheable(false);
                $output = $chunk->process($props, $message);
                $modx->getService('mail', 'mail.modPHPMailer');
                $modx->mail->set(modMail::MAIL_BODY,$output);
                $modx->mail->set(modMail::MAIL_FROM, $modx->getOption('emailsender'));
                $modx->mail->set(modMail::MAIL_FROM_NAME,$profile->get('fullname'));
                $modx->mail->set(modMail::MAIL_SUBJECT,$profile->get('fullname').' - Новая регистрация пользователя на сайте. ');
                $modx->mail->address('to','support@web-meeting.ru');
                $modx->mail->setHTML(true);
                if (!$modx->mail->send()) {
                    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
                    return false;
                }
                $modx->mail->reset();
            }
        }
        break;
    case 'OnLoadWebDocument':
        // Сохраняем дату открытия любой страницы сайта, если пользователь авторизован
        if ($modx->user->isAuthenticated($modx->context->key)) {
            // Здесь мы работаем с текущим пользователем - у него профиль уже загружен
            $profile = $modx->user->Profile;
            $extended = $profile->get('extended');
            $extended['lastactivity'] = date('d.m.Y H:i:s');
            $profile->set('extended', $extended);
            $profile->save();
        }
        break;
}