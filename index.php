  <?php
  //Прописываем header 
  include "configs/db.php";
  include "parts/header.php"

  ?>

  <div class="row" id="products">
    <?php
    // Подключаем страничку с функционалом пагинации
    include $_SERVER['DOCUMENT_ROOT'] . "/modules/products/pag.php";
    ?>

  </div><!-- / row right -->
  <!-- Добавили кнопку Показать ещё-->
  <div class="row">
    <div class="col-4 offset-4">
      <input type="hidden" value=1 id="current-page">
      <?php
      // Условие которое скрывает кнопку Показать на последней странице пагинации
      if ($nav < $num_rows) {
      ?>
        <button class="btn btn-primary lg-btn" id="get-more">
          Показать ещё...
        </button>
      <?php
      }
      ?>


    </div>
  </div>
  <!-- Добавил пагинацию цифрами--->
  <div class="row mt-5">
    <div class="col-4 offset-4">
      <nav aria-label="...">
        <ul class="pagination pagination-lg">
          <?php

          // Запускаем цикл который берет данные с pag.php и формирует количество страниц и поставляет линк
          for ($i = 1; $i <= $num_rows; $i++) {
            if ($i != $nav) {
              echo '<li class="page-item"><a href = " ' . $_SERVER['PHP_SELF'] . '?str=' . $i . ' " class="page-link"> ' . $i . ' </a></li>';
            } else {
              echo '<li class="page-item active"><a href = " ' . $_SERVER['PHP_SELF'] . '?str=' . $i . ' " class="page-link"> ' . $i . ' </a></li>';
            }
          }
          ?>
        </ul>
      </nav>
    </div>
  </div>
  <!--end pagination- -->

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