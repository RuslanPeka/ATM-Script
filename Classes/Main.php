<?php

namespace Classes;

require_once "Interfaces/Start.php";
require_once "Interfaces/Authentication.php";
require_once "Interfaces/Money.php";
require_once "Interfaces/Finish.php";
require_once "Traits/Code.php";
require_once "Traits/Validator.php";
require_once "Help.php";

class Main implements Interfaces\Start, Interfaces\Authentication, Interfaces\Money, Interfaces\Finish
{
    use Traits\Code;
    use Traits\Validator;

    public $dbConfigs;
    public $conn;

    public function __construct()
    {
        $this->dbConfigs = require_once "configs/db.php";
        $this->conn = mysqli_connect($this->dbConfigs['driver'], $this->dbConfigs['user'], $this->dbConfigs['pass'], $this->dbConfigs['database']);
    }

    public function welcome()
    {
        echo '<p class="welcome">Добро пожаловать, уважаемый клиент!</p>';
    }

    public function pr()
    {
        echo '<p class="welcome">Наш банк объединяет миллионы людей со всех уголков страны!</p>';
    }

    public function marketing()
    {
        echo '<p class="welcome">Предлагаем воспользоваться выгодными условиями депозита!<br>
              За консультацией, обратитесь в ближайшее отделение Банка!</p>';
    }

    public function startOfWork()
    {
        $this->welcome();
        echo '<hr>';
        $this->pr();
        echo '<hr>';
        $this->marketing();
    }

    public function checkTelephone(int $num)
    {
        $num = $this->valid($num);
        $result = mysqli_query($this->conn, "SELECT COUNT(*) as count FROM `clients` WHERE (`telephone` = $num)");
        $row = mysqli_fetch_array($result);
        if($row > 0) $_SESSION['tel'] = $num;
        return $row['count'];
    }

    public function checkCard(int $num)
    {
        $num = $this->valid($num);
        $result = mysqli_query($this->conn, "SELECT COUNT(*) as count FROM `clients` WHERE ( `card` = $num )");
        $row = mysqli_fetch_array($result);
        return $row['count'];
    }

    public function checkPin(int $num)
    {
        $num = $this->valid($num);
        $result = mysqli_query($this->conn, "SELECT COUNT(*) as count FROM `clients` WHERE ( `pin` = $num )");
        $row = mysqli_fetch_array($result);
        return $row['count'];
    }

    public function telephoneStart(int $num)
    {
        $num = $this->valid($num);
        if($this->checkTelephone($num) > 0) {
            header('Location: http://atm.lan/pin.php');
        } else {
            return $_SESSION['warning'] = 'К сожалению, номер телефона<br>не соответствует Вашему счёту!';
        }
    }

    public function cardStart(int $num)
    {
        $num = $this->valid($num);
        if($this->checkCard($num) > 0) {
            header('Location: http://atm.lan/pin.php');
        } else {
            return $_SESSION['warning'] = 'К сожалению, номер карты не действителен!';
        }
    }

    public function enterCard(int $numer)
    {
        $numer = $this->valid($numer);
        $result = mysqli_query($this->conn, "SELECT `id` FROM `clients` WHERE (`pin` = $numer)");
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['connect'] = 'card';
        if($this->checkPin($numer) > 0) header('Location: http://atm.lan/mainMenu.php');
        else $_SESSION['mistake'] = 'PIN-код - неверный';
    }

    public function enterTelephone(int $numer)
    {
        $numer = $this->valid($numer);
        $val = $_SESSION['tel'];
        $result = mysqli_query($this->conn, "SELECT `id` FROM `clients` WHERE (`telephone` = $val)");
        $row = mysqli_fetch_array($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['connect'] = 'telephone';
        if($_POST['pin'] == $_SESSION['code']) header('Location: http://atm.lan/mainMenu.php');
        else $_SESSION['mistake'] = 'Введённый код - неверный';
    }

    public function withdrawal(int $id, int $num)
    {
        $num = $this->valid($num);
        $result = mysqli_query($this->conn, "SELECT `money` FROM `clients` WHERE (`id` = $id)");
        $row = mysqli_fetch_array($result);
        if($num <= $row['money']) {
            $remains = $row['money'] - $num;
            $result = mysqli_query($this->conn, "UPDATE `clients` SET `money` = $remains WHERE (`id` = $id)");
            header('Location: http://atm.lan/cheque.php');
        } else {
            $_SESSION['mistake'] = '<br><br><b>На счету недостаточно средств...</b>';
        }
    }

    public function withdrawalCharity(int $id, int $num)
    {
        $num = $this->valid($num);
        $id = $this->valid($id);
        $result = mysqli_query($this->conn, "SELECT `money` FROM `clients` WHERE (`id` = $id)");
        $row = mysqli_fetch_array($result);
        if($num <= $row['money']) {
            $remains = $row['money'] - $num;
            $result = mysqli_query($this->conn, "UPDATE `clients` SET `money` = $remains WHERE (`id` = $id)");
            $_SESSION['charity'] = '+';
            unset($_SESSION['survey']);
            header('Location: http://atm.lan/cheque.php');
        } else {
            $_SESSION['mistake'] = '<br><br><b>На счету недостаточно средств...</b>';
        }
    }

    public function checkAccount(int $id)
    {
        $id = $this->valid($id);
        $result = mysqli_query($this->conn, "SELECT `money` FROM `clients` WHERE (`id` = $id)");
        $row = mysqli_fetch_array($result);
        return $row['money'];
    }

    public function setAnswer(int $id, string $str)
    {
        $str = htmlspecialchars($str);
        $id = $this->valid($id);
        $result = mysqli_query($this->conn, "UPDATE `clients` SET `survey` = '$str' WHERE (`id` = $id)");
        $_SESSION['survey'] = '+';
        unset($_SESSION['charity']);
        header('Location: http://atm.lan/success.php');
    }

    public function finish()
    {
        unset($_SESSION['mistake']);
        unset($_SESSION['id']);
        unset($_SESSION['connect']);
        unset($_SESSION['code']);
        unset($_SESSION['warning']);
        unset($_SESSION['survey']);
        unset($_SESSION['charity']);
        header('Location: http://atm.lan/');
    }

}