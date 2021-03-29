<?php

namespace Classes\Traits;

trait Validator
{
    public function valid(int $number)
    {
        $result = trim($number);
        $result = htmlspecialchars($result);
        return (int)$result;
    }
}