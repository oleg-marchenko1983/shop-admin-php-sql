<?php
//Прописываем header 
include "configs/db.php";
include "parts/header.php"

?>

<div class="row" id="products">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Count</th>
                <th scope="col">Cost</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Заполнняем таблицу данными с JSON который добавили при нажатие на добавить в корзину
            //Проверка существует ли кука 
            if (isset($_COOKIE["basket"])) {
                // Записываем в переменую JSON с заказами
                $basket = json_decode($_COOKIE["basket"], true);
                
                // Цикл выводит заказаные товары в таблицу, count () - выводит количество
                for ($i = 0; $i < count($basket['basket']); $i++) {
                    $sql = "SELECT * FROM products WHERE id=" . $basket['basket'][$i]['product_id'];
                    $result = $conn->query($sql);
                    $product = mysqli_fetch_assoc($result);
                    // Умножаем количество товара на его суму которая в базе данных
                    $countSum = $basket['basket'][$i]['count'];
                    $sumCost = $product["cost"];
                    $totalCost = $countSum * $sumCost;
                   
            ?>
                    <tr>
                        <th scope="row"><?php echo $product["id"] ?></th>
                        <td><?php echo $product["title"] ?></td>

                        <td><input style="width: 60px;" id="input-count<?php echo $product['id']?>" onchange="editProductBasket(this,<?php echo $product['id']?>,<?php echo $product['cost']?>)" 
                        type="text" name="count" value="<?php echo $basket['basket'][$i]['count']?>"></td>
                        
                        <td id="calc<?php echo $product['id']?>"><?php echo $totalCost ?></td>

                        <td><button onclick="deleteProductBusket(this, <?php echo $product["id"] ?>)" class="btn btn-danger">Delete</button></td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div><!-- / row right -->
<!---- Показываем форму для заказа если есть товары в куки----->
<?php
if (isset($_COOKIE["basket"])) {
?>
    <div class="row">
        <div class="col - 4">
            <h1 class="display-4 text-center">Форма заказа</h1>
            <form method="POST" action="modules/basket/order.php">

                <div class="form-row">
                    <div class="form-group col-md-6 ">
                        <label for="inputEmail4">Имя</label>
                        <input type="text" class="form-control" id="inputName" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Телефон</label>
                        <input type="text" class="form-control" id="inputPhone" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Email</label>
                    <input type="text" class="form-control" id="inputEmail" name="email">
                </div>
                <div class="form-group">
                    <label for="inputAddress">Адресс</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="adress">
                </div>
                <div class="col-4 offset-4 mt-4">
                    <button type="submit" class="btn btn-primary d-flex justify-content-center">Оформить заказ</button>
                </div>
            </form>
        </div><!-- end col 4 --->
    </div> <!-- /end --- row form-->
<?php
}
?>

<?php
//Подключаем footer
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"
?>

<?php
/*
  1. Сделать кнопку на главной "Показать ещё" - done
  2. Выводить на главную только 6 товаров - готово
  3. При клике на кнопку , обращаться в базу данных и выводить ещё 6 товаров
  4. Сделать Ajax запросом
  5. Выводить на главную ещё 6 товаров.
  */
?>