<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:49
 */

namespace zukr\test2;

use PHPUnit\Framework\TestCase;

class FrancTest extends TestCase
{
    public function testTimes()
    {
        $five = Money::franc(5);
        self::assertEquals(Money::franc(10), $five->times(2));
        self::assertEquals(Money::franc(15), $five->times(3));
    }
}
