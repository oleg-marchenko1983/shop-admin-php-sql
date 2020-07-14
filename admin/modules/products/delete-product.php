<!--Подключаем файл с настройками к базе данных-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'?>
<!-- <?php
        // Выводим с базы товар который передался вместе с id
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        ?> -->

<?php
// Удаляем товар по id который передался
if (isset($_GET["id"])) {
    //Записываем в переменую id
    $id = $_GET["id"];
    $sql = "DELETE FROM `products` WHERE `products`.`id` = $id ";
    if($conn->query($sql)) {
        header("Location: /admin/products.php");
    };
}
//Подключаем шапку сайта
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php"
?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb col-9">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/admin/products.php">
                Categories</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET["id"] ?></li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">DELETE PRODUCTS</h4>
                                    <p class="card-category">Удаление товаров</p>
                                </div>
                            </div>
                            <!---------- Форма удаления товаров----------->
                            <form actions="http://shop-master.local/admin/delete.php">
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

                                <button type="submit" class="btn btn-primary">Delete item</button>
                            </form><!--- end col-md-12 - table --->
                        </div>
                        <!--- /col-md-12 - table --->

                    </div>
                    <!--- /row - table --->

                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 