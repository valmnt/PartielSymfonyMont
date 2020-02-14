<?php

namespace App\Utils;

class EstimationPrix
{

    public function Price(int $yearCar, int $nbKm, int $nbDays)
    {
        $price = $nbKm / $yearCar;
        $price = $price * $nbDays;
        return $price;
    }
}
