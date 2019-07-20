<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:13
 */

namespace zukr\test2;


class Dollar extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }


    public function times(int $multiplier)
    {
        return new self($this->amount * $multiplier);
    }

}