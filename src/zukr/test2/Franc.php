<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:48
 */

namespace zukr\test2;


class Franc extends Money
{
    public function __construct(int $amount,string $currency)
    {
       parent::__construct($amount, $currency);
    }
}