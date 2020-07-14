<!--Подключаем файл с настройками к базе данных-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php'?>

<?php
// Меняем статус заказа в таблице orders на 'send"
if (isset($_GET["id"])) {
    //Записываем в переменую id
    $id = $_GET["id"];
    $sql = "UPDATE `orders` SET `status` = 'Send' WHERE `orders`.`id` =" . $_GET["id"];
    if($conn->query($sql)) {
        header("Location: /admin/orders.php");
    };
}