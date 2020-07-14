 <!-- Создаем переменую для активного меню -->
 <?php
    // Покдлючение к базе данных
    include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
    $page = "home";
    // Подключеам шапку сайта
    include "parts/header.php"
    ?>
    

 <?php include "parts/footer.php" ?>