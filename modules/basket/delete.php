<?php
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Проверяем ли существует куки
    if (isset($_COOKIE["basket"])) {

        $basket = $_COOKIE["basket"];
        // Переводим с json обратно в масив
        $basket = json_decode($_COOKIE["basket"], true);

        // Циклом перебираем массив
        for ($i = 0; $i < count($basket["basket"]); $i++) {
            // Проверяем совпадают ли id товара в корзине и того который пришёл в POST
            if ($basket["basket"][$i]['product_id'] == $_POST["id"]) {
                // unset() удаляет строку из масива
                unset($basket["basket"][$i]);
                // После удаления с масива ,сортирует его віставляет все елементы по порядку
                sort($basket["basket"]);
                
            }
        }

        //Преобразовываем масив в формат JSON - JavaScript Object Notification
        $jsonProduct = json_encode($basket);

        //Удаляем куки
        setcookie('basket', "", 0, "/");
        //Записываем наш товар в куки, передаём ему json формат товара, "/" - значит віводиться на всех страницах
        setcookie('basket', $jsonProduct, time() + 60 * 60, "/");

        // Выводим количество елементов, функция count считает в масиве
        echo $jsonProduct;
    }
}
