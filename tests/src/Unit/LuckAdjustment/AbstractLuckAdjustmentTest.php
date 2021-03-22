<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDiceTests\Unit;

use Ouxsoft\LuckByDice\LuckAdjustment\DefaultLuckAdjustment;
use PHPUnit\Framework\TestCase;

class AbstractLuckAdjustmentTest extends TestCase
{
    private $luckAdjustment;

    public function setUp(): void
    {
        $this->luckAdjustment = new DefaultLuckAdjustment;
    }

    public function tearDown(): void
    {
        unset($this->luckAdjustment);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment::setMax
     */
    public function testSetMax()
    {
        $value = 1;
        $this->luckAdjustment->setMax($value);
        $this->assertEquals($value, $this->luckAdjustment->getMax());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment::getMax
     */
    public function testGetMax()
    {
        $value = 1;
        $this->luckAdjustment->setMax($value);
        $this->assertEquals($value, $this->luckAdjustment->getMax());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment::setMin
     */
    public function testSetMin()
    {
        $value = 1;
        $this->luckAdjustment->setMax($value);
        $this->assertEquals($value, $this->luckAdjustment->getMax());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment::getMin
     */
    public function testGetMin()
    {
        $value = 1;
        $this->luckAdjustment->setMax($value);
        $this->assertEquals($value, $this->luckAdjustment->getMax());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment::getName
     */
    public function testGetName(){
        $this->assertEquals(DefaultLuckAdjustment::class, $this->luckAdjustment->getName());
    }
}