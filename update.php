<?php
// Полуение данных
$id = $_POST['id'];
$title = $_POST['title'];
$descriptions = $_POST['descriptions'];
$status = isset($_POST['status']) ? 1 : 0;
$category = $_POST["category"];
// Соеденение с базой
require "db.php";
// Подготовка запроса
$sql = 'UPDATE products SET title=?, descriptions=?, status=?, category_id=? WHERE id=?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $title);
$statement->bindValue(2, $descriptions);
$statement->bindValue(3, $status);
$statement->bindValue(4, $category);
$statement->bindValue(5, $id);
$statement->execute();


if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $image_name = $_FILES['image']['name'];

    $sql = 'SELECT * FROM products WHERE id = ?';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute();
    $product = $statement->fetch(PDO::FETCH_ASSOC);

    if (is_file('uploads/' . $product['images'])) {
        unlink('uploads/' . $product['images']);
    }

    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image_name);

    $sql = 'UPDATE products SET images=? WHERE id=?';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $image_name);
    $statement->bindValue(2, $id);
    $statement->execute();
}

header("Location: /index.php");