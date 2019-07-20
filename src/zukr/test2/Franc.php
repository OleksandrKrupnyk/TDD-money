<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:48
 */

namespace zukr\test2;


class Franc
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    private $amount;

    public function times(int $multiplier)
    {
        return new self($this->amount * $multiplier);
    }

    public function equals(Franc $obj)
    {
        return $this->amount === $obj->amount;
    }
}