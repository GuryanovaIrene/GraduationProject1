<?php
    require_once '../vendor/autoload.php';

    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465))
        ->setUsername('GuryanovaIrene@gmail.com')
        ->setPassword('lompr317krasn539');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message('Ваш заказ принят'))
        ->setFrom(['GuryanovaIrene@gmail.com' => 'Гурьянова Ирина'])
        ->setTo([$email => $customerName])
        ->setBody($strHead . $strAddress . $strContent . $strFoot);
    $result = $mailer->send($message);
