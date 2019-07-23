<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 3:36
 */

namespace zukr\test2;

/**
 * Class Sum
 *
 * @package zukr\test2
 */
class Sum implements Expression
{
    /**
     * @var Expression
     */
    public $augend;
    /**
     * @var Expression
     */
    public $addend;

    /**
     * Sum constructor.
     *
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * {@inheritDoc}
     */
    public function reduce(Bank $bank, string $to): Expression
    {
        $amount = $this->addend->reduce($bank, $to)->amount
            + $this->augend->reduce($bank, $to)->amount;
        return new Money($amount, $to);
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
     * @param int $multiplier
     * @return Expression
     */
    public function times(int $multiplier): Expression
    {
        return new Sum($this->augend->times($multiplier), $this->addend->times($multiplier));
    }
}