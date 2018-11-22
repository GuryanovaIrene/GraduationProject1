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

<h1 align="center">Регистрация</h1>
<form method="POST" action="order.php">
    <table align="center">
        <tr>
            <td>Введите e-mail</td>
            <td><input type="text" name="email"/></td>
        </tr>
        <tr>
            <td>Введите имя</td>
            <td><input type="text" name="customerName"/></td>
        </tr>
        <tr>
            <td>Введите телефон</td>
            <td><input type="text" name="phone"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="OK"/></td>
        </tr>
    </table>
</form>
</body>
</html>