
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
            <button class="btn btn-primary add-to-cart btn-busket" 
            onclick="addToBasket(this)" data-id="<?php echo $row['id']?>">
            
            В корзину</button>
        </div>
    </div><!-- / card -->

</div> <!---/ card col-4 --->