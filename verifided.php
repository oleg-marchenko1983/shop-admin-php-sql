<?php
//Прописываем  подключение к БД и header 
include "configs/db.php";
// Функционал верифицирует пользователя
if (isset($_GET['u_code'])) {

    $sql = "SELECT * FROM users WHERE confirm_mail='" . $_GET['u_code'] . "'";

    $result = $conn->query($sql);
    // Если строка пррисутвует , тогда обновляем колонку verifided  на один
    if ($result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        // Обновляем статус колонки verifided на 1
        $sql = "UPDATE `users` SET `verifided` = '1' WHERE `users`.`id` = " . $user["id"];
        //И очишаем колонку с кодом верификации
        $sql1 = "UPDATE `users` SET `confirm_mail` = '' WHERE `users`.`id` =" . $user["id"];

        if ($conn->query($sql) && $conn->query($sql1)) {
            echo "Пользователь верифицирован";
            header("Location: /login.php");
        }
    }
}
// Условие проверяет был ли отправлен  POST запрос если нет 3будет ворнинг 
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    //***Функционал Регистрации****//
    if (isset($_POST["email"])) {
        //Вызываем функцию которая генерирует рандомное число
        $u_code = generateRandomString(20);
        echo "Письмо отправлено </br>";
        echo "Венуться на страничку Авторизации <a href='/login.php'>Авторизация</a>";
        // Переменая сожержит ссылку которая опрвиться на почту
        $link = "'<a href=http://shop-master.local/register.php?u_code=$u_code'>Confirm</a>";
        //Функция отправляет на почту ссылку для подтвержднния регистрации
        mail($_POST["email"], 'Register', $link);
    } else {
        echo "Ошибка";
    }
}

// Функция генерирует рандомное число
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/icon.png">

    <title>Verifided</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <h1 class="display-4 text-center">Отправить письмо подтверждения</h1>
                <form method="POST" action="#">

                    <div class="row">
                        <div class="form-group col-6">

                            <p>Введите Ваш e-mail<input type="text" class="form-control" id="inputEmail" name="email"></p>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary mt-4">Отправить</button>
                        </div>
                    </div>


            </div>



            </form>
        </div><!-- end col 4 --->


    </div> <!-- /end --- row form-->
    </div> <!-- /end --- container form-->
</body>

</html>
<?php
//Подключаем footer
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"
?>