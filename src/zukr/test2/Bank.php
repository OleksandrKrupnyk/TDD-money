<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 3:24
 */

namespace zukr\test2;


class Bank
{

    public function reduce(Expression $source, string $to)
    {
        return $source->reduce($to);
    }
}