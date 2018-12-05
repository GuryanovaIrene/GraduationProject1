<?php
    require_once '../vendor/autoload.php';

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
        ->setUsername('guryanovairene@gmail.com')
        ->setPassword('loftschool');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Ваш заказ принят'))
        ->setFrom(['guryanovairene@gmail.com' => 'Гурьянова Ирина'])
        ->setTo([$email => $customerName])
        ->setBody($strHead . $strAddress . $strContent . $strFoot);
    $result = $mailer->send($message);
