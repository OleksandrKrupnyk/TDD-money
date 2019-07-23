<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 3:36
 */

namespace zukr\test2;


class Sum implements Expression
{
    /**
     * @var Money
     */
    public $augend;
    /**
     * @var Money
     */
    public $addend;

    /**
     * Sum constructor.
     *
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->addend->amount + $this->augend->amount;
        return new Money($amount, $to);
    }
}