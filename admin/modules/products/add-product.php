<!--Подключаем файл с настройками к базе данных-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//Подключаем шапку сайта
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php";
?>
<?php
// Функционал добавления товара в базу данных
if (
    isset($_POST["title"]) && isset($_POST["descr"])
    && isset($_POST["content"]) && $_POST["cat_id"] && $_POST["image"] && isset($_POST["title"]) != "" 
    && isset($_POST["descr"]) != "" && isset($_POST["content"]) != "" && isset($_POST["cat_id"]) != ""
) {
    $imgway = "/admin/img/";
    // переменая SQL строка которая добавляет текст в таблицу products введеный в input.
    $sql = "INSERT INTO products ( `title`, `descriptions`, `content`, `category_id`, `image` ) VALUES 
(' " . $_POST["title"] . " ', ' " . $_POST["descr"] . " ',' " . $_POST["content"] . " ' ,' " . $_POST["cat_id"] . " ',' " . $imgway . $_POST["image"] . " ')";
    if($conn->query($sql)) {
        echo "Товар добавлен </br>";
    } else {
        echo "Error" . $conn->error;
    }
}
?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb col-9">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
        <li class="breadcrumb-item">
                Add Product
        </li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
<div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="card col-md-6">
            <div class="card-header">
                <h4 class="card-title text-center pb-3">Add Product</h4>
            </div>
        </div>
        </div>
        <!------ФОРМА ДОБАВЛЕНИЯ ТОВАРА--------->
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="descr" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" name="content" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cat_id">
                            <option value="0">Не выбрано</option>
                            <?php 
                      /*---------------Выбираем с базы таблицу с категориями--------------*/
                            $sql = "SELECT * FROM `categories`";
                            $result = $conn -> query($sql);
                     /*---------------- Цикл для вывода категорий-------------------------*/
                            while($row = mysqli_fetch_assoc($result)) {
                     /*------------------Встанвляем id и название категории с таблицы category----------*/
                              echo "<option value=" . $row["id"] . ">" . $row["title"] . "</option>";
                            };
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
            <button type="submit" value="1" class="btn btn-primary">Add product</button>
                </div>
</div>
        </form>

    </div>
    <! --- /col-md-12 - table --->

</div>
<! --- /row - table --->

<?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 