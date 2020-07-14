<?php 
   // Покдлючение к базе данных
   include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
 /*-----------Выбираем товары с базы данных-----*/
 // Обьявляем переменую в которой будет храниться id страницы
if(isset($_GET["page"])) {
  $page = $_GET["page"];
} else {
  $page = 1;
}
// Записываем в переменную текущую страницу у множеную на 6 записей с БД
$offset = $page * 6;
// Выбираем с таблицы продуктов только 6 записей и не показываем  последние
 $sql = "SELECT * FROM products LIMIT 6 OFFSET " . $offset;
 $result = $conn->query($sql);

 while ($row = mysqli_fetch_assoc($result)) {
   // Подключаем старничку с  карточками товаров
   include  $_SERVER['DOCUMENT_ROOT'] .  "/parts/product_cart.php";
 }

?>