<?php
// Делаем подключение к базе данных
include $_SERVER['DOCUMENT_ROOT'] . "/configs/db.php";
/* ------------------------------- Функционал вывода отзывов  и поиска отзывов-----------------*/
if (isset($_POST["search-feedback"])) {
    //создаем запрос на поиск имен из БД где есть частичное совпадение в таблице `product` в полях description и 
    $sql = "SELECT * FROM product WHERE descriptions LIKE '%" . $_POST["search-feedback"] . "%'";
    //результат запроса пишем в переменную
    $result = $conn->query($sql);
    //считаем количество строк (совпадений) для запуска цикла
    $product = mysqli_fetch_assoc($result);
    $i = 0;
    if ($$product == 0) {
?>
        <div class="not-found">
            <h2>Not found</h2>
        </div>
    <?php
    }
    while ($i < $product) {
        //получаем результирующий ряд в виде ассоциативного массива
        $feedback = mysqli_fetch_assoc($result);
        //выводим список 
    ?>

        <?php
        // Вывести имя конкретного пользователя
        $sql = "SELECT * FROM product";
        // выполняем запрос
        $result = $conn->query($sql);
        // записываем в переменную масив с данными пользователя
        $row = mysqli_fetch_assoc($result);
        ?>
        <!----- Отдельно каротчка товара ----->
        <div class="col-4">
            <div class="card m-2">
                <img style="width:100%; height:100%" src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="product.php?id=<?php echo $row['id'] ?>">
                        <h5 class="card-title"><?php echo $row["title"] ?></h5>
                    </a>
                    <p class="card-text"><?php echo $row["descriptions"] ?></p>
                    <!-- Присваиваем кнопке событие клик и передаем data её id шник-->
                    <button class="btn btn-primary add-to-cart btn-busket" onclick="addToBasket(this)" data-id="<?php echo $row['id'] ?>">

                        В корзину</button>
                </div>
            </div><!-- / card -->

        </div>
        <!---/ card col-4 --->
        </div>

<?php $i = $i + 1;
    }
    // Иначе выводим все отзывы по умолчанию
} else {
    // Подключаем страничку с функционалом пагинации
    include $_SERVER['DOCUMENT_ROOT'] . "/modules/products/pag.php";
}
?>