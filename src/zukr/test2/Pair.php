<?php
/**
 * Project: StudyPHPUNit
 * Date: 23.07.2019
 * Time: 22:54
 */

namespace zukr\test2;

/**
 * Class Pair
 *
 * @package zukr\test2
 */
class Pair
{
    private $from;
    private $to;

    /**
     * Pair constructor.
     *
     * @param $from
     * @param $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

    /**
     * @param Pair $obj
     * @return bool
     */
    public function equals(Pair $obj): bool
    {
        return $this->from === $obj->from && $this->to === $obj->to;
    }

    /**
     * @return int
     */
    public function hashCode(): int
    {
        return 0;
    }
}