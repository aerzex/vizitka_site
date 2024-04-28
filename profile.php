<!DOCTYPE html>
    <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="src/styles/main.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400..700&display=swap" rel="stylesheet">

            <title>Алексеенко A.P.</title>
        </head>
        <body>
            <div class="navbar">
                <div class="navbar-logo">
                  <img src="src/images/logo.png" alt="Logo">
                </div>
                <div class="navbar-links">
                  <a class="pixelify-sans" href="index.html">Главная</a>
                  <a class="pixelify-sans" href="index.html">Главная</a>
                  <a class="pixelify-sans" href="index.html">Главная</a>
                  <a class="pixelify-sans" href="index.html" class="active">Главная</a>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="pixelify-sans">Немного о себе</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <h2 class="pixelify-sans">Алексеенко Алексей, студент второго курса на направлении "Компьютерная безопасность" в 
                            Дальневосточном федеральном университете. Мне нравится сфера информационной 
                            безопасности и программирования. Я очень целеустремлённый и ответственный человек, поэтому я верю, 
                            что за время моего обучения я узнаю много о своей будущей профессии и выпущусь отличным специалистом.</h2>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="image"></div>
                        </div>
                        <div class = "row"><p class="text-image pixelify-sans">Мой кумир</p>
                              </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container">
                <div class = "row">
                    <div class="button col-12">
                        <button id="mabatton">Нажми</button>
                        <p id="demo"></p>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="src/js/button.js"></script>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="pixelify-sans">Привет, <?php echo $_COOKIE['User']; ?></h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="profile.php" enctype="multipart/form-data" name="upload">
                            <div class="row post reg">
                                <input class="form-control" type="text" name="title" placeholder="Title">
                            </div>
                            <div class="row post reg">
                                <input class="form-control" type="text" name="text" placeholder="Text">
                            </div>
                            <div class="row post reg">
                                <input type="file" name="file" /><br>
                            </div>
                            <button type="submit" id="mabatton" name="submit" value="upload">Добавить пост</button>
                        </form>
                    </div>
                </div>
    </html>

    <?php
    require_once('bd.php');

    $link = mysqli_connect('127.0.0.1', 'root', '123456', 'bd_name');

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $main_text = $_POST['text'];

        if (!$title || !$main_text) die ('Пожалуйста введите все значения!');

        $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

        if(!mysqli_query($link, $sql)) die ('Не удалось добавить пост');

        if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "src/upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "src/upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
    }
    ?>