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
        <h1>Вы желаете напечатать чек?</h1>
        <a href="success.php?cheque=yes">Да, печатать</a>
        <br>
        <a href="success.php?cheque=no">Нет, не печатать</a>
    </div>
</body>
</html>