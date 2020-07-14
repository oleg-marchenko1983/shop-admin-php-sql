<!--Подключаем файл с настройками к базе данных-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'?>
<!-- <?php
        // Выводим с базы товар который передался вместе с id
        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?> -->

<?php
// Удаляем категорию по id который передался
if (isset($_GET["id"])) {
    //Записываем в переменую id
    $id = $_GET["id"];
    $sql = "DELETE FROM categories WHERE `categories` .`id` = $id ";
    if($conn->query($sql)) {
        header("Location: /admin/categories.php");
    };
}
//Подключаем шапку сайта
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php"
?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">DELETE CATEGORIES</h4>
                                    <p class="card-category">Удаление категорий</p>
                                </div>
                            </div>
                            <!---------- Форма удаления товаров----------->
                            <form actions="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>ID</label>
                                        <?php
                                        if (isset($id)) {
                                        ?>
                                            <input type="text" class="form-control" value="<?php echo $id; ?>">
                                        <?php
                                        }
                                        ?>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Delete category</button>
                            </form><!--- end col-md-12 - table --->
                        </div>
                        <!--- /col-md-12 - table --->

                    </div>
                    <!--- /row - table --->

                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 