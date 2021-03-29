<?php

namespace Classes\Traits;

trait Code
{
    public function createCode()
    {
        $result = '';
        for($i = 1; $i <= 4; $i++) {
            $result .= (string)mt_rand(1, 9);
        }
        return (int)$result;
    }
}