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
<?php
$dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
$prepare = $pdo->prepare('select customerID from customers where email=:email');
$prepare->execute(['email' => $_POST['email']]);
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $value) {
    $customerID = $value['customerID'];
}
if (!isset($customerID)) {
    // Если пользователь не найден, то создаем нового
    $prepare = $pdo->prepare('insert into customers(email, customerName, phone)
                                        values (:email, :customerName, :phone)');
    $prepare->execute(['email' => $_POST['email'], 'customerName' => $_POST['customerName'], 'phone' => $_POST['phone']]);
    $customerID = $pdo->lastInsertId();
}

if (isset($customerID)) {
    echo '<h1 align="center">Приветствуем Вас, ' . $_POST['customerName']. '!</h1>';
    ?>
    <form method="POST" action="orderWrite.php">
        <input type="hidden" value="<?php echo $customerID;?>" name="customerID"/>
        <table align="center">
            <tr>
                <td>Введите адрес заказа</td>
                <td><textarea name="address" cols="50" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>Примечание к заказу</td>
                <td><textarea name="note" cols="50" rows="3"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="OK"/></td>
            </tr>
        </table>
    </form>
    <?php
}
?>
</body>
</html>
