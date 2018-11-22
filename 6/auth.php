<?php
function auth($email, $customerName, $phone)
{
    $dsn = "mysql:host=127.0.0.1;dbname=burgers;charset=utf8";
    $pdo = new PDO($dsn, 'root', '');
    $prepare = $pdo->prepare('select customerID from customers where email=:email');
    $prepare->execute(['email' => $email]);
    $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $value) {
        $customerID = $value['customerID'];
    }
    if (!isset($customerID)) {
        // Если пользователь не найден, то создаем нового
        $prepare = $pdo->prepare('insert into customers(email, customerName, phone)
                                        values (:email, :customerName, :phone)');
        $prepare->execute(['email' => $email, 'customerName' => $customerName, 'phone' => $phone]);
        $customerID = $pdo->lastInsertId();
    }
    if (isset($customerID)) {
        return $customerID;
    } else {
        return 0;
    }
}