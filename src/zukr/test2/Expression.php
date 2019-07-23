<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 3:26
 */

namespace zukr\test2;

/**
 * Interface Expression
 *
 * @package zukr\test2
 */
Interface Expression
{
    /**
     * Конверитровать в валюту
     *
     * @param Bank   $bank
     * @param string $to Имя Валюты
     * @return Expression
     */
    public function reduce(Bank $bank, string $to): Expression;

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression;

    /**
     * @param int $multiplier
     * @return Expression
     */
    public function times(int $multiplier): Expression;
}