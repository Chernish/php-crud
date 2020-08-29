<?php
// Соеденение с базой
require "../db.php";
// Полуение id
$id = $_GET['id'];
$sql = 'SELECT * FROM categories WHERE id = ?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $id);
$statement->execute();
$categories = $statement->fetch(PDO::FETCH_ASSOC);

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
      <div class="col-md-6">
        <h1>Изменение продукта</h1>
        <hr>
        <form action="update.php" method="post">
          <div class="form-group">
            <label for="">Название</label>
            <input type="text" name="title" class="form-control" value="<?php echo $categories['title'];?>">
          </div>
          <div class="form-group">
            <button class="btn btn-warning">Изменить</button>
          </div>
            <input type="hidden" name="id" value="<?php echo $categories['id'];?>">
        </form>
      </div>
    </div>
  </div>
</body>

</html>