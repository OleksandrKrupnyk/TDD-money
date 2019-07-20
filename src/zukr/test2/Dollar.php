<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:13
 */

namespace zukr\test2;


class Dollar
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public $amount;

    public function times(int $multiplier)
    {
        return new self($this->amount * $multiplier);
    }

    public function equals(Dollar $obj)
    {
        return $this->amount === $obj->amount;
    }
}