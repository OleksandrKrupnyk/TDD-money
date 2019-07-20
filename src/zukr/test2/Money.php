<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:52
 */

namespace zukr\test2;


abstract class Money
{
    protected $amount;

    public function equals(Money $obj)
    {
        return ($this->amount === $obj->amount &&
            static::class === get_class($obj)
        );
    }

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount);
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount);
    }
    abstract function times(int $multiplier): Money;
}