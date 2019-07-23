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
     * @param Bank   $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money;
}