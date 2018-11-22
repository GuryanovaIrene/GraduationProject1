<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница
    </title>
    <link rel="stylesheet" href="../css/vendors.min.css">
    <link rel="stylesheet" href="../css/main.min.css">
</head>
<body>
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
$strHead = 'Заказ №' . $orderID;
$strAddress = 'Ваш заказ будет доставлен по адресу: ' . $_POST['address'];
$strContent = 'Содержимое заказа: DarkBeefBurger за 500 рублей 1, шт.';
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

$dt = date('Y-m-d H_i');
//  Создание директории
mkdir("ordTxt/" . $dt);
//  Запись в файл
file_put_contents("ordTxt/" . $dt . "/" . $orderID . ".txt",
    $strHead . "\r\n" . $strAddress . "\r\n" . $strContent . "\r\n \r\n" . $strFoot);

echo $strHead . '<br/>' . $strAddress . '<br/>' . $strContent . '<br/><br/>' . $strFoot . '<br/>';
echo '<a href="../index.html"> << Вернуться на главную страницу</a>';
?>
</body>
</html>
