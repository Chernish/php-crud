<?php
// Полуение id
$id = $_GET['id'];
// Соеденение с базой
require "db.php";

$sql = 'SELECT * FROM products WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

if (is_file('uploads/' . $product['images'])) {
    unlink('uploads/' . $product['images']);
}


$sql = 'DELETE FROM products WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();

header("Location: /index.php");