<?php
/**
 * Project: StudyPHPUNit
 * Date: 21.07.2019
 * Time: 1:22
 */

namespace zukr\test2;

use PHPUnit\Framework\TestCase;
use zukr\test2\Expression;

/**
 * Class MoneyTest
 *
 * @package zukr\test2
 */
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

    public function testReduceSum(): void
    {
        /**
         * @var Expression $sum
         * @var Bank       $bank
         * @var Money      $result
         */
        $sum    = new Sum(Money::dollar(3), Money::dollar(4));
        $bank   = new Bank();
        $result = $bank->reduce($sum, 'USD');
        self::assertEquals(Money::dollar(7), $result);
    }

    public function testReduceMoney(): void
    {
        $bank   = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');
        self::assertEquals(Money::dollar(1), $result);
    }

    public function testReduceMoneyDifferrntCurrency(): void
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::franc(2), 'USD');
        self::assertEquals(Money::dollar(1), $result);
    }

    public function testIdentityRate(): void
    {
        self::assertEquals(1, (new Bank())->rate('USD', 'USD'));
    }

    public function testMixedAddition(): void
    {
        $fiveBucks = Money::dollar(5);
        $tenFranks = Money::franc(10);
        $bank      = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce($fiveBucks->plus($tenFranks), 'USD');
        self::assertEquals(Money::dollar(10), $result);
    }

    public function testSumPlusMoney(): void
    {
        $fiveBucks = Money::dollar(5);
        $tenFranks = Money::franc(10);
        $bank      = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $sum    = (new Sum($fiveBucks, $tenFranks))->plus($fiveBucks);
        $result = $bank->reduce($sum, 'USD');
        self::assertEquals(Money::dollar(15), $result);
    }

    public function testSumTimes(): void
    {
        $fiveBucks = Money::dollar(5);
        $tenFranks = Money::franc(10);
        $bank      = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $sum    = (new Sum($fiveBucks, $tenFranks))->times(2);
        $result = $bank->reduce($sum, 'USD');
        self::assertEquals(Money::dollar(20), $result);
    }
}
