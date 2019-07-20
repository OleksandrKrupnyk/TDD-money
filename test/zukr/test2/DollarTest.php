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

    public function testTimes(): void
    {
        $five = Money::dollar(5);
        self::assertEquals(Money::dollar(10), $five->times(2));
        self::assertEquals(Money::dollar(15), $five->times(3));
    }

    public function testEquals(): void
    {
        self::assertTrue(Money::dollar(5)->equals(Money::dollar(5)));
        self::assertFalse(Money::dollar(5)->equals(Money::dollar(6)));
        self::assertTrue(Money::franc(5)->equals(Money::franc(5)));
        self::assertFalse(Money::franc(5)->equals(Money::franc(6)));
        self::assertFalse(Money::franc(5)->equals(Money::dollar(5)), 'Franc 5 != Dollar 5');
    }
}
