<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:52
 */

namespace zukr\test2;


use phpDocumentor\Reflection\Types\String_;

abstract class Money
{
    protected $amount;
    /**
     * @var string
     */
    protected $currency;

    public static function dollar(int $amount): Money
    {
        return new Dollar($amount,'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Franc($amount,'CHF');
    }

    public function equals(Money $obj)
    {
        return ($this->amount === $obj->amount &&
            static::class === get_class($obj)
        );
    }

    abstract function times(int $multiplier): Money;

    public function currency(): String
    {
        return $this->currency;
    }

    public function __construct(int $amount,string $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

}