<?php
// Соеденение с базой
require "db.php";
// Формирование запроса
$sql = "SELECT * FROM products"; // Получение данных из таблици продукты
$statement = $pdo->query($sql); // Выполняет SQL-запрос и возвращает результирующий набор в виде объекта
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // Возвращаем все данные таблицы products в массиве

$sql = 'SELECT * FROM categories';
$statement = $pdo->query($sql);
$categories = $statement->fetchAll(PDO::FETCH_ASSOC);
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
        <h1 style="margin-top: 40px;">Мои продукты</h1>
          <a href="create.php" class="btn btn-success">Добавить продукт</a>
          <a style="margin-left: 20px;" href="categories/index.php">Перейти к категориям</a>
        <hr>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Название</th>
              <th>Категория</th>
              <th>Описание</th>
              <th>Картинка</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            <?php // При помощи цикла foreach Выводим данные из базы данных
            foreach ($products as $product) { ?>
              <tr>
                <td><?php echo $product['id']; ?></td>
                <td><a href="show.php?id=<?php echo $product['id']; ?>"><?php echo $product['title']; ?></a></td>
                <td> <?php $title_category = $categories[$product['category_id'] - 1];
                echo $title_category['title']?></td>
                <td><?php echo $product['descriptions']; ?></td>
                <td><img style="width: 200px; height: 200px;" src="/uploads/<?php echo $product['images']; ?>" alt=""></td>
                <td>
                  <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-warning">Изменить</a>
                  <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Вы уверены?')">Удалить</a>
                </td>
              </tr>
            <? }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>

</html>