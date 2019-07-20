<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:13
 */

namespace zukr\test2;


class Dollar extends Money
{

    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }


    public function times(int $multiplier): Money
    {
        return Money::dollar($this->amount * $multiplier);
    }
}