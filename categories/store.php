<?php
require "../db.php";
$title = $_POST["title"];

$sql = 'INSERT INTO categories (title) VALUES (:title)';
$statement = $pdo ->prepare($sql);
$statement->execute([
    'title' => $title,
]);

header("Location: /categories/index.php");