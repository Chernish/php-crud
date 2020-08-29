<?php
// Соеденение с базой
require "../db.php";
// Формирование запроса
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
        <div class="col-md-10">
            <h1>Категории</h1>
            <a href="create.php" class="btn btn-success">Добавить Категорию</a>
            <a style="margin-left: 20px;" href="../index.php">Перейти к товарам</a>
            <hr>
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Действия</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($categories as $category) { ?>
                    <tr>
                        <td><?php echo $category['id']; ?></td>
                        <td><a href="show.php"><?php echo $category['title']; ?></a></td>
                        <td>
                            <a href="edit.php?id=<?php echo $category['id']; ?>" class="btn btn-warning">Изменить</a>
                            <a href="delete.php?id=<?php echo $category['id']; ?>" class="btn btn-danger"
                               onclick="return confirm('Вы уверены?')">Удалить</a>
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