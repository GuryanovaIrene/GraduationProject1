<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Главная страница
    </title>
    <link rel="stylesheet" href="./css/vendors.min.css">
    <link rel="stylesheet" href="../css/main.min.css">
</head>
<body>
<h1 align="center">Список зарегистрированных пользователей</h1>
<table border="1" align="center">
    <thead>
    <tr>
        <th>ИД пользователя</th>
        <th>e-mail</th>
        <th>Имя пользователя</th>
        <th>Телефон</th>
    </tr>
    </thead>
<?php
$dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
$prepare = $pdo->prepare('select customerID, email, customerName, phone from customers
                                    order by customerID');
$prepare->execute();
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $value) {
    ?>
    <tr>
        <td align="center"><?php echo $value['customerID'];?></td>
        <td><?php echo $value['email'];?></td>
        <td><?php echo $value['customerName'];?></td>
        <td><?php echo $value['phone'];?></td>
    </tr>
    <?php
}
?>
</table>
<br/>
<h1 align="center">Список заказов</h1>
<table align="center" border="1">
    <thead>
    <tr>
        <th>ИД заказа</th>
        <th>ИД пользователя</th>
        <th>Адрес заказа</th>
        <th>Примечание к заказу</th>
    </tr>
    </thead>
    <?php
    $prepare = $pdo->prepare('select orderID, customerID, address, note from orders
                                    order by orderID');
    $prepare->execute();
    $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $value) {
        ?>
        <tr>
            <td align="center"><?php echo $value['orderID'];?></td>
            <td align="center"><?php echo $value['customerID'];?></td>
            <td><?php echo $value['address'];?></td>
            <td><?php echo $value['note'];?></td>
        </tr>
        <?php
    }
    ?>
</table>
</body>
</html>