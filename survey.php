<?php
    require_once "Classes/Main.php";
    session_start();
    $survey = new Classes\Main;
    if(isset($_POST['answer'])) $survey->setAnswer($_SESSION['id'], $_POST['answer']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Опрос для клиентов Банка</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="workSpaceMain">
        <h2>Довольны ли Вы качеством обслуживания сотрудников отделений Банка?</h2>
        <form action="" method="post">
            <label><input type="radio" name="answer" id="" value="yes"> Да</label>
            <br>
            <label><input type="radio" name="answer" id="" value="no"> Нет</label>
            <br><br>
            <button type="submit">Отправить</button>
        </form>
    </div>
</body>
</html>