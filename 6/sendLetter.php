<?php
    require_once '../vendor/autoload.php';

    $transport = (new Swift_SmtpTransport('smtp.mailtrap.io', 2525))
        ->setUsername('c09bacb3443038')
        ->setPassword('ceeaa92ccb76e5');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Ваш заказ принят'))
        ->setFrom(['guryanovairene@gmail.com' => 'Гурьянова Ирина'])
        ->setTo([$email => $customerName])
        ->setBody($strHead . $strAddress . $strContent . $strFoot);
    $result = $mailer->send($message);
