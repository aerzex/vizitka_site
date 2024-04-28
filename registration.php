<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="src/styles/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">
        <title>Алексеенко A.P.</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Регистрация</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="registration.php">
                        <div class="row reg">
                            <input class="form-control" type="email" name="email" placeholder="E-mail">
                        </div>
                        <div class="row reg">
                            <input class="form-control" type="text" name="username" placeholder="Login">
                        </div>
                        <div class="row reg">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="mabatton" name="submit">Зарегистрироваться</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    
require_once('bd.php');

$link = mysqli_connect('127.0.0.1', 'root', '123456', 'bd_name');

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');

    $sql = "INSERT INTO users (email, username, pass) VALUES ('$email', '$username', '$password')";

    if(!mysqli_query($link, $sql)) {
    echo "Не удалось добавить пользователя";
    }
}
?>
