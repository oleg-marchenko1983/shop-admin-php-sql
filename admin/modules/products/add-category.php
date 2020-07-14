<!--Подключаем файл с настройками к базе данных-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
//Подключаем шапку сайта
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php";
?>
<?php
// Функционал добавления категорий в базу данных
if (
    isset($_POST["title"]) && isset($_POST["title"]) != ""
) {
    // переменая SQL строка которая добавляет текст в таблицу products введеный в input.
    $sql = "INSERT INTO categories ( `title`) VALUES 
(' " . $_POST["title"] . " ')";
    // Условие проверяет подключение к базе и строку sql запроса        
    if($conn->query($sql)) {
        header("Location: /admin/categories.php");
    } else {
        echo "Error" . $conn -> error;
    }
}
?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb col-9">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/categories.php">Categories</a></li>
        <li class="breadcrumb-item">
                Add category
        </li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
<div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="card col-md-6">
            <div class="card-header">
                <h4 class="card-title text-center pb-3">Add category</h4>
            </div>
        </div>
        </div>
        <form actions="" method="POST">
            <!------ФОРМА ДОБАВЛЕНИЯ категории--------->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mt-4">
            <button type="submit" class="btn btn-primary">Add category</button>
                </div>
              </div>
        </form>

    </div>
    <! --- /col-md-12 - table --->

</div>
<! --- /row - table --->

<?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 