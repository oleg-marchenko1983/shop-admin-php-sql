<!--Подключаем файл с настройками к базе данных-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//Подключаем шапку сайта
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php"
?>

<?php
// Функционал изминения товара в базе данных
if (isset($_GET["id"]) && isset($_POST["title"])) {
    $title = "' " . $_POST["title"] . " '";

    // переменая SQL строка которая изменит текст в таблицу products введеный в input.
    $sql = "UPDATE `categories` SET `title` = $title WHERE `id` = ' " . $_GET["id"] . " '";
    // Условие проверяет подключение к базе и строку sql запроса        
    if($conn->query($sql)) {
        header("Location: /admin/categories.php");
    } else {
        echo "Error" . $conn->error;
    }
   
}
//Выбираем с базы данных categories
$sql = "SELECT * FROM categories WHERE id=" . $_GET["id"];
$category = mysqli_fetch_assoc($conn->query($sql));
?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb col-9">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/categories.php">
                Categories</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Categories : <?php echo $category["title"] ?></li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>

<div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="card col-md-6">
            <div class="card-header">
                <h4 class="card-title text-center pb-3">Edit Category</h4>
            </div>
        </div>
        </div>
        <!------ФОРМА редактирования ТОВАРА--------->
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
                <div class="col-md-6 mt-4">
            <button type="submit" value="1" class="btn btn-primary">Edid category</button>
                </div>
</div>
        </form>

    </div>
    <! --- /col-md-12 - table --->

</div>
<! --- /row - table --->

<?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 