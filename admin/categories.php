<?php 
/*Создаем переменую для активного меню*/
$page = "categories";
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
                Categories
        </li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Category</h4>
                        </div><!--- row - form --->
                                </div>
                                <div class="row">
                            <!--- FORM add product--------->
                            <div class="col-md-6">
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/add-category.php" class="btn btn-primary">Add category</a>
                            </div>
                        </div><!--- row - form --->
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>id</th>
                                            <th>Name</th>
                                        </thead>
                                        <tbody>
                                        <?php 
                      /*---------------Выбираем с базы таблицу с категориями--------------*/
                            $sql = "SELECT * FROM `categories`";
                            $result = $conn -> query($sql);
                     /*---------------- Цикл для вывода категорий-------------------------*/
                            while($row = mysqli_fetch_assoc($result)) {
                     /*------------------Встанвляем id и название категории с таблицы category----------*/
                            ?>
                                                <tr>
                                                    <td><?php echo $row["id"]; ?></td>
                                                    <td><?php echo $row["title"]; ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/edit-category.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Edit</a>
                                <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/delete-category.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a>
                                                        </div>
                            </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div> 
                        </div> <!--- /col-md-12 - table --->
                    </div> <!--- /row - table --->
          <?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php"?> 