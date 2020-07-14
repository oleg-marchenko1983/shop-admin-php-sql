<?php 
/*Создаем переменую для активного меню*/
$page = "products";
/*Подключаем файл с настройками к базе данных*/
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
//Подключаем шапку сайта
include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/header.php"
?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb col-9">
        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
        <li class="breadcrumb-item">
                Product
        </li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title mb-3">Products</h4>
                                    <div class="row">
                            <!--- FORM add product--------->
                            <div class="col-md-12 mt-10">
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/add-product.php" class="btn btn-primary">Add product</a>
                            </div>
                        </div><!--- row - form --->
                                </div>
                                
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Descriptions</th>
                                            <th>Category</th>
                                            <th>Options</th>
                                        </thead>
                                        <tbody>

                                            <?php
                                            // Выбираем все поля в таблице продукты
                                            $sql = "SELECT * FROM products";
                                            // Подключение к базе данных
                                            $result = $conn->query($sql);
                                            // Цикл вывода товаров
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                
                                            ?>
                                                <tr>
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><?php echo $row["title"]; ?></td>
                                                    <td><?php echo $row["descriptions"]; ?></td>
                                                    <td><?php echo $row["category_id"]; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/edit-product.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Edit</a>
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/delete-product.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> <!--- /col-md-12 - table --->
                    </div> <!--- /row - table --->

                        

          <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 