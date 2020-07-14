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
            View products for orders by ID : <?php echo $_GET['id']?>
        </li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
<div class="row">
    <div class="col-md-12">
        <div class="card strpied-tabled-with-hover">
            <div class="card-header ">
                <h4 class="card-title mb-3">View Products</h4>
                <div class="row">
                </div>
                <!--- row - form --->
            </div>

            <div class="card-body table-full-width table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Id</th>
                        <th scope="row">Товар</th>
                        <th>Описание</th>
                        <th>Кол-во</th>
                        <th>Цена</th>
                        <th>Сума</th>

                    </thead>
                    <tbody>
                        <?php
                        // Выбираем все поля в таблице продукты
                        $sql = "SELECT * FROM orders WHERE id=" . $_GET['id'];
                        // Подключение к базе данных
                        $result = $conn->query($sql);
                        // Цикл вывода товаров
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            
                                
                                <?php
                                // *** Функционал выводит название заказаного товара *** //
                                //Переводим строку с json в массив
                                $orderProduct = json_decode($row["products"], true);
                                // Цикл выводит с таблицы products ,все которые сходяться с id товара
                                for ($i = 0; $i < count($orderProduct['basket']); $i++) {
                                    $sql = "SELECT * FROM products WHERE id=" . $orderProduct['basket'][$i]['product_id'];
                                    $resultProducts = $conn->query($sql);
                                    $product = mysqli_fetch_assoc($resultProducts);
                                    // Умножаем количество товара на его суму которая в базе данных
                                    $countSum = $orderProduct['basket'][$i]['count'];
                                    $sumCost = $product["cost"];
                                    $totalCost = $countSum * $sumCost;

                                ?>
                                <tr>
                                        <td> <?php echo $orderProduct['basket'][$i]['product_id'] ?></td>
                                        <td><?php echo $product["title"]; ?></td>
                                        <td><?php echo $product["descriptions"]; ?></td>
                                        <td><?php echo $orderProduct['basket'][$i]['count'] ?></td>
                                        <td><?php echo $product["cost"] ?></td>
                                        <td><?php echo $totalCost ?></td>
 
                                </tr>
                                                                       <?php
                                } //end for
                                ?>
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