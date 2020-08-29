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
        <div class="col-md-6">
            <h1>Изменение продукта</h1>
            <hr>
            <form action="update.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Название</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $product['title']; ?>">
                </div>
                <div class="form-group">
                    <label for="">Описание</label>
                    <textarea name="descriptions" id="" cols="30" rows="10"
                              class="form-control"><?php echo $product['descriptions']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Категория</label>
                    <select name="category" id="">
                        <?php foreach ($categories as $category) { ?>
                            <option value="<?php echo $category['id']; ?>" <?php echo $category['id'] == $product['category_id'] ? 'selected' : '' ?>><?php echo $category['title']; ?></option>
                        <?
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Картинка</label>
                    <input name="image" type="file">
                </div>
                <div class="form-group">
                    <img src="/uploads/<?php echo $product['images']; ?>">
                </div>
                <div class="form-group">
                    <button class="btn btn-warning">Изменить</button>
                </div>
                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
            </form>
        </div>
    </div>
</div>
</body>

</html>