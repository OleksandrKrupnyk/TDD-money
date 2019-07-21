<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 3:24
 */

namespace zukr\test2;


class Bank
{

    public function reduce(Money $sum, string $string)
    {
        return Money::dollar(10);
    }
}