<?php
    require_once "Classes/Main.php";
    session_start();
    $charity = new Classes\Main;
    if(!empty($_POST['charity'])) $charity->withdrawalCharity($_SESSION['id'], $_POST['charity']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Благотворительность</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="workSpaceMain">
        <form action="" method="post">
            <label>
                Укажите сумму, которую желаете перевести на благотворительность:<br><br>
                <input type="text" name="charity" id="">
            </label>
            <br><br>
            <button type="submit">Отправить</button>
            <?php
                if(!empty($_SESSION['mistake'])) echo $_SESSION['mistake'];
            ?>
        </form>
    </div>
</body>
</html>