<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 3:24
 */

namespace zukr\test2;

use zukr\test2\Currency as C;

/**
 * Class Bank
 *
 * @package zukr\test2
 */
class Bank
{
    /**
     * @var array
     */
    private $rates = [];

    /**
     * Преобразовать в валюту
     *
     * @param Expression $source
     * @param string     $to
     * @return Expression
     */
    public function reduce(Expression $source, string $to): Expression
    {
        return $source->reduce($this, $to);
    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     */
    public function rate(string $from, string $to): int
    {
        if ($from === $to) return 1;
        return (int)$this->rates[$from][$to]['rate'];
    }

    /**
     * @param string $from
     * @param string $to
     * @param int    $rate
     */
    public function addRate(string $from, string $to, int $rate): void
    {
        $this->rates [$from][$to] = ['pair' => new Pair($from, $to), 'rate' => $rate];
    }
}