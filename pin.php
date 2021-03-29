<?php
    require_once "Classes/Main.php";
    session_start();
    $_SESSION['mistake'] = '';
    if(!empty($_POST['pin'])) {
        $auth = new Classes\Main();
        if(!empty($_SESSION['code'])) {
            $auth->enterTelephone($_POST['pin']);
        } else {
            $auth->enterCard($_POST['pin']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подтверждение входа</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="workSpacePin">
        <?php
            if(!empty($_SESSION['code'])) echo 'Код смс-сообщения: ' . $_SESSION['code'];
        ?>
        <form action="" method="post">
            <p>Введите код подтверждения:</p>
            <input type="text" name="pin" id="">
            <button type="submit">Отправить</button>
            <?php
                if(!empty($_SESSION['mistake'])) echo '<br><br>' . $_SESSION['mistake'];
            ?>
        </form>
    </div>
</body>
</html>