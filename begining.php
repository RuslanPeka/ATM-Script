<?php
    require_once "Classes/Main.php";
    $auth = new Classes\Main();
    session_start();
    $_SESSION['warning'] = '';
    if(!empty($_POST['cardNum']) && empty($_POST['telephoneNum'])) {
        $_SESSION['code'] = '';
        $auth->cardStart($_POST['cardNum']);
    }

    if(!empty($_POST['telephoneNum']) && empty($_POST['cardNum'])) {
        $_SESSION['code'] = $auth->createCode();
        $auth->telephoneStart($_POST['telephoneNum']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class='authentication'>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Номер карты:</td>
                    <td><input type="text" name="cardNum" id=""></td>
                </tr>
                <tr>
                    <td>Номер телефона:</td>
                    <td><input type="text" name="telephoneNum" id=""></td>
                </tr>
            </table>
            <br><hr><br>
            <button type="submit">Войти!</button>
            <br><br>
            <?php
                if(!empty($_SESSION['warning'])) echo $_SESSION['warning'];
            ?>
        </form>
        <hr><br>
    </div>
</body>
</html>