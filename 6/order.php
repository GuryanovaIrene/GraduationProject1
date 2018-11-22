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
require_once("auth.php");
$customerID = auth($_POST['email'], $_POST['customerName'], $_POST['phone']);
if ($customerID > 0) {
    ?>
    <h1 align="center">Приветствуем Вас, <?php echo $_POST['customerName'] ?>!</h1>
    <form method="POST" action="orderWrite.php">
        <input type="hidden" value="<?php echo $customerID; ?>" name="customerID"/>
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
} else {
    echo 'К сожалению, заказ не может быть оформлен<br/>
    <a href="../index.html">Вернуться на главную страницу</a>';
}
?>
</body>
</html>
