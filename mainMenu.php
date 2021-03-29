<?php
    require_once "Classes/Main.php";
    session_start();
    $_SESSION['mistake'] = '';
    $menu = new Classes\Main;
    if(!empty($_POST['money'])) {
        $menu->withdrawal($_SESSION['id'], $_POST['money']);
    }
    if(!empty($_POST['sum'])) {
        if($_POST['sum'] % 100 == 0) {
            $menu->withdrawal($_SESSION['id'], $_POST['sum']);
        } else {
            $_SESSION['correctSum'] = 'Сумма должна быть кратна 100';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главное меню</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <script src="js/rate.js"></script>
    <div class="workSpaceMain">
        <form action="" method="post">
            Быстрое снятие валюты:<br>
            <label><p><input type="radio" name="money" id="100" value="100"> 100 грн</p></label>
            <label><p><input type="radio" name="money" id="" value="200"> 200 грн</p></label>
            <label><p><input type="radio" name="money" id="" value="500"> 500 грн</p></label>
            <label><p><input type="radio" name="money" id="" value="1000"> 1000 грн</p></label>
            <br>
            <button type="submit">Снять деньги</button>
        </form>
        <br><hr><br>
        <a href="bankAccount.php">Проверить счёт</a><br><br><hr><br>
        <form action="" method="post">
            <label>
                Снять другую сумму<br><br>
                <input type="text" name="sum" id="">
            </label>
            <br><br>
            <button type="submit">Снять деньги</button>
            <?php
                if(!empty($_SESSION['correctSum'])) echo '<br>' . $_SESSION['correctSum'];
            ?>
            <?php
                if(!empty($_SESSION['mistake'])) echo '<>' . $_SESSION['mistake'];
            ?>
        </form>
        <br><hr><br>
        <button onclick="rate();">Курс валют</button>
        <br><br><hr><br>
        <a href="proposals.php">Завершение работы</a>
    </div>
</body>
</html>