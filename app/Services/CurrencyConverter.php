<?php

namespace App\Services;

class CurrencyConverter
{
    public static function GBPtoUSD(int $gbp)
    {
        return $gbp * 1.734;
    }
}
