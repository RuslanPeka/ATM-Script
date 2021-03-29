<?php
    require_once "Classes/Main.php";
    session_start();
    $finish = new Classes\Main;
    if(isset($_POST['finish'])) $finish->finish();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завершение работы</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="workSpaceMain">
    <h2>Благодарим Вас за сотрудничество в нашим Банком!</h2>
    <?php
        if($_SESSION['connect'] == 'card') echo "Не забудьте забрать Вашу карту!";
    ?>
    <br><hr><br>
    <form action="" method="post">
        <button name="finish">Завершение работы</button>
    </form>
    </div>
</body>
</html>