<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:52
 */

namespace zukr\test2;


class Money
{
    protected $amount;

    public function equals(Money $obj)
    {
        return ($this->amount === $obj->amount &&
            static::class === get_class($obj)
        );
    }
}