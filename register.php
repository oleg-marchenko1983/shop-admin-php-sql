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
            echo "Пользователь подтверждён </br>";
            echo "Перейдите на страницу авторизации <a href='/login.php'>Авторизация</a>";
        }
    }
}
// Условие проверяет был ли отправлен  POST запрос если нет 3будет ворнинг 
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {
    //***Функционал Регистрации****//
    if ( isset($_POST["name"])  && isset($_POST["pass"] )) {


        // Проверяем есть ли в строке запрос u_code
        // Шифруем пароль с помощью команды md5
        $password = md5($_POST["pass"]);
        //Вызываем функцию которая генерирует рандомное число
        $u_code = generateRandomString(20);
        $sql = "INSERT INTO users(login, password, email,confirm_mail) VALUE ('" . $_POST["name"] . "', '$password' ,'" . $_POST["email"] . "','$u_code' )";
        if ($conn->query($sql)) {
            echo "Пользователь зарегистрирован";
            // Переменая сожержит ссылку которая опрвиться на почту
            $link = "'<a href=http://shop-master.local/register.php?u_code=$u_code'>Confirm</a>";
            //Функция отправляет на почту ссылку для подтвержднния регистрации
            mail($_POST["email"], 'Register', $link);
        } else {
            echo "Ошибка Регистрации";
        }
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

    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mr-5">
                <h1 class="display-4 text-center">Регистрация</h1>
                <form method="POST" action="#">

                    <div class="form-row">
                        <div class="form-group col-md-6 ">
                            <label for="inputEmail4">Имя</label>
                            <input type="text" class="form-control" id="inputName" name="name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Пароль</label>
                            <input type="password" class="form-control" id="inputPass" name="pass">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="email">
                    </div>
                    <div class="col-4 offset-4 mt-4">
                        <button type="submit" class="btn btn-primary d-flex justify-content-center mr-4 mb-3">Регистрация</button>
                        <a href="/login.php" class="text-underline pl-4">Войти</a>
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