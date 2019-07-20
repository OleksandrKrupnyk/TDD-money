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
        $five = new Franc(5);
        self::assertEquals(new Franc(10), $five->times(2));
        self::assertEquals(new Franc(15), $five->times(3));
    }
}
