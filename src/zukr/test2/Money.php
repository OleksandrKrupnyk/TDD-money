<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:52
 */

namespace zukr\test2;


class Money implements Expression
{
    public $amount;
    /**
     * @var string
     */
    protected $currency;

    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount): Money
    {
        return new Money($amount, 'CHF');
    }

    public function equals(Money $obj): bool
    {
        return ($this->amount === $obj->amount &&
            $this->currency === $obj->currency
        );
    }


    public function currency(): String
    {
        return $this->currency;
    }

    public function __construct(int $amount, string $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

    public function times(int $multiplier): Money
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    public function plus(Money $addend): Expression
    {
        return new Sum($this,$addend);
    }

    public function reduce(string $to): Money
    {
        return $this;
    }
}