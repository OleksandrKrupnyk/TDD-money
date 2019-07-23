<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:52
 */

namespace zukr\test2;

use zukr\test2\Currency as C;

/**
 * Class Money
 *
 * @package zukr\test2
 */
class Money implements Expression
{
    /**
     * @var int
     */
    public $amount;
    /**
     * @var string
     */
    protected $currency;

    /**
     * @param int $amount
     * @return Money
     */
    public static function dollar(int $amount): Money
    {
        return new Money($amount, C::USD);
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function franc(int $amount): Money
    {
        return new Money($amount, C::CHF);
    }

    /**
     * @param Money $obj
     * @return bool
     */
    public function equals(Money $obj): bool
    {
        return ($this->amount === $obj->amount &&
            $this->currency === $obj->currency
        );
    }

    /**
     * @return String
     */
    public function currency(): String
    {
        return $this->currency;
    }

    /**
     * Money constructor.
     *
     * @param int    $amount
     * @param string $currency
     */
    public function __construct(int $amount, string $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

    /**
     * @param int $multiplier
     * @return Expression
     */
    public function times(int $multiplier): Expression
    {
        return new Money($this->amount * $multiplier, $this->currency);
    }

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression
    {
        return new Sum($this, $addend);
    }

    /**
     * {@inheritDoc}
     */
    public function reduce(Bank $bank, string $to): Expression
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }
}