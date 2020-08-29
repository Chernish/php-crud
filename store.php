<?php
require "db.php";
$title = $_POST["title"];
$descriptions = $_POST["descriptions"];
$status = isset($_POST["status"]) ? 1 : 0;
$category = $_POST["category"];
$image_name = null;
if (is_uploaded_file($_FILES['image']['tmp_name'])) { // tmp_name - временное имя
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image_name); // перемещаем файл в uploads
}

$sql = 'INSERT INTO products (title, descriptions, status, images, category_id) VALUES (:title, :descriptions, :status, :image, :category)';
$statement = $pdo ->prepare($sql); // Подготавливаем запрос к выполнению
$statement->execute([ // Запусказем запрос на выполенение и передаем
    'title' => $title,
    'descriptions' => $descriptions,
    'status' => $status,
    'category' => $category,
    'image' => $image_name
]);

header("Location: /index.php");