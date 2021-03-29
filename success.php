<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Успех!</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="workSpaceMain">
        <?php
            if(!empty($_GET['cheque'])) {
                if($_GET['cheque'] == 'yes') {
                    echo '<h3>Получите Ваш чек.</h3><br>';
                } elseif($_GET['cheque'] == 'no') {
                    echo '<h3>Благодарим за заботу об экологии!</h3><br>';
                }
            }
        ?>
        <h1>Операция выполнена успешно!</h1>
        <?php
            if(isset($_SESSION['survey']) || isset($_SESSION['charity'])) {
                if($_SESSION['survey'] == '+') echo 'Благодарим за участие в опросе!<br><a href="exit.php">Завершение работы</a>';
                if($_SESSION['charity'] == '+') echo 'Благодарим за щедрость!<br><a href="exit.php">Завершение работы</a>';
            } else {
                echo '<a href="mainMenu.php">Вернуться на главную страницу</a>';
            }
        ?>
        
    </div>
</body>
</html>