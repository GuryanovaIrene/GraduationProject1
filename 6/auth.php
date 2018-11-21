<?php
$dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
$pdo = new PDO($dsn, 'root', '');
$prepare = $pdo->prepare('select userID from users where email=:email');
$prepare->execute(['email' => $_POST['email']]);
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $value) {
    $userID = $value['userID'];
}
if (!isset($userID)) {
    // Если пользователь не найден, то создаем нового
    $prepare = $pdo->prepare('insert into users(email, userName, phone)
                                        values (:email, :userName, :phone)');
    $prepare->execute(['email' => $_POST['email'], 'userName' => $_POST['userName'], 'phone' => $_POST['phone']]);
}
$prepare = $pdo->prepare('select userID from users where email=:email');
$prepare->execute(['email' => $_POST['email']]);
$data = $prepare->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $value) {
    $userID = $value['userID'];
}