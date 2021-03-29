<?php

namespace Classes\Interfaces;

interface Authentication
{
    public function checkTelephone(int $num);

    public function checkCard(int $num);

    public function checkPin(int $num);

    public function telephoneStart(int $num);

    public function cardStart(int $num);

    public function enterCard(int $numer);

    public function enterTelephone(int $numer);
}