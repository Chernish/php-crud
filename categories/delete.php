<?php
// Полуение id
$id = $_GET['id'];
// Соеденение с базой
require "../db.php";
$sql = 'DELETE FROM categories WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();

header("Location: /categories/index.php");