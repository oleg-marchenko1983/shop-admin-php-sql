<?php
//Прописываем  подключение к БД и header 
include "configs/db.php";
// Функционал верифицирует пользователя

// Условие проверяет был ли отправлен  POST запрос если нет 3будет ворнинг 
if (isset($_POST) and $_SERVER['REQUEST_METHOD'] == 'POST') {

    //** Функционал Авторизации ***//
    if (isset($_POST['name'])) {
        // Шифруем пароль с помощью команды md5
        $password = md5($_POST["pass"]);
        $sql_login = "SELECT * FROM users where login= '" . $_POST['name'] . "' AND password= '$password'";

        $result = $conn->query($sql_login);
        $user = mysqli_fetch_assoc($result);
    
        if ($result->num_rows > 0 && $user['verifided'] !== "0") {
            echo "Пользователь найден . <br/>";
        } else {
            echo "Зарегистрирйтесь или потвердите регистарцию в письме на Вашей почте </br>";
            echo "Если письмо не пришло перейдите по этой ссылке <a href='/verifided.php'>Отправить повторно</a>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="img/icon.png">

    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 mr-5">
                <h1 class="display-4 text-center">Авторизация</h1>
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
                    <div class="col-12 offset-5 mt-4 mb-4">
                        <button type="submit" class="btn btn-primary d-flex justify-content-center mb-3 ml-1">Войти</button>
                        <a href="/register.php" class="text-underline mt-4">Регистрация</a>
                    </div>
                </form>
            </div><!-- end col 6 --->

        </div> <!-- /end --- row form-->
    </div> <!-- /end --- container form-->
</body>

</html>
<?php
//Подключаем footer
include $_SERVER['DOCUMENT_ROOT'] . "/parts/footer.php"
?>