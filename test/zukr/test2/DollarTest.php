<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:22
 */

namespace zukr\test2;

use PHPUnit\Framework\TestCase;

class DollarTest extends TestCase
{

    public function testTimes()
    {
        $five = new Dollar(5);
        $five->times(2);
        self::assertEquals(10, $five->amount);
    }
}
