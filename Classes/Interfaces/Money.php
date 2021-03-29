<?php

namespace Classes\Interfaces;

interface Money
{
    public function withdrawal(int $id, int $num);

    public function checkAccount(int $id);
}