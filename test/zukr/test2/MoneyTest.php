<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:22
 */

namespace zukr\test2;

use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
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
        self::assertFalse(Money::franc(5)->equals(Money::dollar(5)), 'Franc 5 != Dollar 5');
    }

    public function testCurrency(): void
    {
        self::assertEquals('USD', Money::dollar(1)->currency());
        self::assertEquals('CHF', Money::franc(1)->currency());
    }

    public function testPlusResultSum()
    {
        $five = Money::dollar(5);
        /**
         * @var Expression $result
         */
        $result = $five->plus($five);
        /**
         * @var Sum $sum
         */
        $sum = $result;

        self::assertEquals($five, $sum->augend);
        self::assertEquals($five, $sum->addend);
    }
}
