<?php
    require_once "Classes/Main.php";
    session_start();
    $account = new classes\Main;
    $money = $account->checkAccount($_SESSION['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ваше счёт</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="workSpaceMain">
        <h3>На вашем счету:<br><?=$money?> ₴</h3>
        <br>
        <a href="mainMenu.php">Вернуться на главную страницу</a>
    </div>
</body>
</html>