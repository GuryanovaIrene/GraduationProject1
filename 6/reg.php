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
    <script src="../js/main.min.js"></script>
</head>
<body>
    <h1 align="center">Регистрация</h1>
    <form method="POST" action="auth.php">
        <table>
            <tr>
                <td>Введите e-mail <input type="email" name="email"/></td>
                <td>Введите имя <input type="text" name="userName" size="50"/></td>
                <td>Введите телефон <input type="text" name="phone"/></td>
                <td><input type="submit" value="OK"/></td>
            </tr>
        </table>
    </form>
</body>
</html>