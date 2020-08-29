<?php
// Полуение данных
$id = $_POST['id'];
$title = $_POST['title'];
// Соеденение с базой
require "../db.php";
// Подготовка запроса
$sql = 'UPDATE categories SET title=? WHERE id=?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $title);
$statement->bindValue(2, $id);
$statement->execute();

header("Location: /categories/index.php");