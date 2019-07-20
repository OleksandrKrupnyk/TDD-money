<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:48
 */

namespace zukr\test2;


class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }


    public function times(int $multiplier): Money
    {
        return new Franc($this->amount * $multiplier);
    }


}