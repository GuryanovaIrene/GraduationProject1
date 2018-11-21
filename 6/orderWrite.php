<?php
$dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
$prepare = $pdo->prepare('insert into orders(customerID, address, note)
                                    values (:customerID, :address, :note)');
$prepare->execute(['customerID' => $_POST['customerID'], 'address' => $_POST['address'], 'note' => $_POST['note']]);

$orderID = $pdo->lastInsertId();

$prepare = $pdo->prepare('select email from customers where customerID = :customerID');
$prepare->execute(['customerID' => $_POST['customerID']]);
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $value) {
    $email = $value['email'];
}

$prepare = $pdo->prepare('select count(1) ordersCount from orders where customerID = :customerID');
$prepare->execute(['customerID' => $_POST['customerID']]);
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $value) {
    $ordersCount = $value['ordersCount'];
}

$strHead = 'Заказ №' . $orderID . '<br/>';
$strAddress = 'Ваш заказ будет доставлен по адресу: ' . $address . '<br/>';
$strContent = 'Содержимое заказа: DarkBeefBurger за 500 рублей 1, шт.<br/><br/>';
if ($ordersCount == 1) {
    $strFoot =  'Спасибо! Это Ваш первый заказ';
} else {
    $strFoot = 'Спасибо! Это уже ' . $ordersCount . ' заказ';
}

if (isset($email)) {
    mail($email,'Ваш заказ принят', $strHead . $strAddress . $strContent . $strFoot);
} else {
    echo 'Не введен e-mail!';
}
echo $strHead . $strAddress . $strContent . $strFoot . '<br/>';
echo '<a href="../index.html"> << Вернуться на главную страницу</a>';