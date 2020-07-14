<?php
/*Создаем переменую для активного меню*/
$page = "orders";
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
            Orders
        </li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title mb-3">Orders</h4>
                <div class="row">
                </div>
                <!--- row - form --->
            </div>

            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>id</th>
                        <th>User_id</th>
                        <th>Статус заказа</th>
                        <th>Имя клиента</th>
                        <th>Телефон</th>
                        <th>Товар</th>
                        <th>Кол-во</th>
                    </thead>
                    <tbody>
                        <?php
                        // Выбираем все поля в таблице продукты
                        $sql = "SELECT * FROM orders";
                        // Подключение к базе данных
                        $result = $conn->query($sql);
                        // Цикл вывода товаров
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            
                                <td><?php echo $row["id"]; ?></td>
                                <td><?php echo $row["user_id"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td><?php echo $row["name"]; ?></>
                                <td><?php echo $row["tel"]; ?></td>
                                <?php
                                // *** Функционал выводит название заказаного товара *** //
                                //Переводим строку с json в массив
                                $orderProduct = json_decode($row["products"], true);
                                // Цикл выводит с таблицы products ,все которые сходяться с id товара
                                for ($i = 0; $i < count($orderProduct['basket']); $i++) {
                                    $sql = "SELECT * FROM products WHERE id=" . $orderProduct['basket'][$i]['product_id'];
                                    $resultProducts = $conn->query($sql);
                                    $product = mysqli_fetch_assoc($resultProducts);

                                ?>

                                <?php
                                } //end for
                                ?>
                                 <td>
                                    <!--- button -->
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/view-products.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">View products</a>
                                        <!-- <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/delete-product.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a> -->
                                    </div>
                                </td>
                                <td>
                                    <!--- button -->
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/change-status.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Change status</a>
                                        <!-- <a href="<?php $_SERVER['DOCUMENT_ROOT'] ?> /admin/modules/products/delete-product.php?id=<?php echo $row["id"]; ?>" type="button" class="btn btn-secondary">Delete</a> -->
                                    </div>
                                </td>
                            </tr>
                        <?php

                        } // end while
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!---end table-full --->
    </div>
    <!--- /col-md-12 - table --->
</div>
<!--- /row - table --->



<?php include $_SERVER['DOCUMENT_ROOT'] . "/admin/parts/footer.php" ?>