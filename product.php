<!----- Страничка с товаром ----->
<?php
//Прописываем  подключение к БД и header 
include "configs/db.php";
include "parts/header.php";

$sql = "SELECT * FROM products WHERE id=" . $_GET["id"];
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
$categoryResult = $conn->query("SELECT * FROM categories WHERE id=" . $row["category_id"]);
$category = mysqli_fetch_assoc($categoryResult)
?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb col-9">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="cat.php?id=<?php echo $category["id"] ?>">
                <?php echo $category["title"] ?></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["title"] ?></li>
    </ol>
</nav>
<!--------end  Хлебные крошки------------>
<div class="row">

    <div class="col-9">
        <div class="card text-center">
            <img style="width:50%; height:20%; margin-left: 25%;margin-top: 10%;" src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
            <div class="card-body">

                <h5 class="card-title"><?php echo $row["title"] ?></h5>

                <p class="card-text"><?php echo $row["descriptions"] ?></p>
                <p class="card-text"><?php echo $row["content"] ?></p>
                <!-- Присваиваем кнопке событие клик и передаем data её id шник-->
            <button class="btn btn-primary add-to-cart btn-busket" id="btn-busket"
            onclick="addToBasket(this)" data-id="<?php echo $row['id']?>">
            
            В корзину</button>
            </div>

        </div>
    </div>


</div><!-- / row right -->
<?php
//Подключаем footer
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"
?>