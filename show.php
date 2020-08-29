<?php
// Соеденение с базой
require "db.php";
// Полуение id
$id = $_GET['id'];
$sql = 'SELECT * FROM products WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);

$category_id = $product['category_id'];
$sql = 'SELECT * FROM categories WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $category_id);
$statement->execute();
$category = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div>
            <h1 style="text-align: center">Просмотр продукта - <?php echo $product['title']; ?></h1>
            <a href="/index.php" class="btn btn-success">Вернуться к продуктам</a>
        </div>
        <hr>
        <div>
          <p><?php echo $product['descriptions']; ?></p>
        </div>
        <div><img style="width: 200px; height: 200px;" src="/uploads/<?php echo $product['images']; ?>" alt=""></div>
        <div>Категория - <?php echo $category['title']; ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>