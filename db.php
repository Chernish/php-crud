<?php
$driver = 'mysql'; // База данных
$host = 'localhost'; // Хост
$db_name = 'crud'; // Имя бд
$db_user = 'root'; // Имя пользователя
$db_password = ''; // Пароль пользователя
$charset = 'utf8'; // Кодировка
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]; // Представляет ошибку, вызванную PDO
$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset"; // Для удобства
// 'mysql:host=localhost;dbname=magazin'
$pdo = new PDO($dsn, $db_user, $db_password, $options); // Подключение к бд черех PDO (PHP Data Objects)