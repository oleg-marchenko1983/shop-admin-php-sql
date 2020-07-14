<?php
// Покдлючение к базе данных
include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/configs/configs.php';
include $_SERVER['DOCUMENT_ROOT'] . '/modules/telegram/send-message.php';

if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = " SELECT * FROM users WHERE phone LIKE '"  .  $_POST["phone"] . "'";

    $user_id = 0;

    $result = $conn->query($sql);

    // Если переменая result true  значит пользователь есть
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        $user_id = $user['id'];
        // Если иначе , тогда пользователя не и мы его регистрируем
    } else {
        $sql = "INSERT INTO users (login, phone, email) VALUES ('" . $_POST["name"] . "', '" . $_POST["phone"] . "', '" . $_POST["email"] . "' )";
        if ($conn->query($sql)) {
            echo "Пользователь добавлен";
            // ПОлучить последний id пользователя
            $user_id = $conn->insert_id;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Записываем данные с формы оформления заказа и продукты с куки 
    $status = "New";
    $sql = "INSERT INTO `orders` (`user_id`,`products`, `adress`, `name`, `tel`, `status`, `email`) 
VALUES ('" . $user_id .  "' , '" . $_COOKIE['basket'] . "', '" . $_POST["adress"] . "', '" . $_POST["name"] . "', '" . $_POST["phone"] . "' , '" . $status . "', '" . $_POST["email"] . "');";
    // Проверка или правильный запрос , если нет то выдаём ошибку
    if ($conn->query($sql)) {
        setcookie('basket', "", 0, "/");
        echo "Заказ добавлен  базу данных!<br>
                <a href='/'> На Главную </a><br><br><br>";
        message_to_telegram("Добавлен новый заказ!!!");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
