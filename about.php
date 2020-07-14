<?php
    //Прописываем header 
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php"
    ?>

  <div class="row">
      <?php
        /*-----------Выбираем товары с базы данных-----*/
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <div class="col-4">
              <div class="card m-2">
                  <img style="width:100%; height:100%" src="<?php echo $row["image"] ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title"><?php echo $row["title"] ?></h5>
                      <p class="card-text"><?php echo $row["descriptions"] ?></p>
                      <a href="#" class="btn btn-primary">В корзину</a>
                  </div>
              </div><!-- / card -->

          </div>
          <!---/ card col-4 --->
      <?php
        }
        ?>

  </div><!-- / row right -->
  <?php
  //Подключаем footer
    include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"
    ?>