<?php
//Прописываем header 
include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
$sql = "SELECT * FROM categories WHERE id=" . $_GET["id"];
$category = mysqli_fetch_assoc($conn->query($sql));

?>
<!-------- Хлебные крошки------------>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb col-9">
    <li class="breadcrumb-item"><a href="/">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $category["title"] ?></li>
  </ol>
</nav>
<!--------end  Хлебные крошки------------>
<div class="row">
  <?php
  /*-----------Выбираем товары с базы данных-----*/
  $sql = "SELECT * FROM products WHERE category_id=" . $_GET['id'];
  $result = $conn->query($sql);

  while ($row = mysqli_fetch_assoc($result)) {
    include "parts/product_cart.php";
  }
  ?>

</div><!-- / row right -->
<?php
//Подключаем footer
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"
?>