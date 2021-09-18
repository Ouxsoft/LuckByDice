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

use PHPUnit\Framework\TestCase;
use Ouxsoft\LuckByDice\Luck;

class LuckTest extends TestCase
{
    private $luck;

    public function setUp(): void
    {
        $this->luck = new Luck(6);
    }

    public function tearDown(): void
    {
        unset($this->luck);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::__construct
     */
    public function test__construct()
    {
        $this->assertEquals(6, $this->luck->get());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::enable
     */
    public function testEnable()
    {
        $this->luck->enable();
        $this->assertTrue($this->luck->getActiveStatus());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::disable
     */
    public function testDisable()
    {
        $this->luck->disable();
        $this->assertFalse($this->luck->getActiveStatus());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::getActiveStatus
     */
    public function testGetActiveStatus()
    {
        $this->assertTrue($this->luck->getActiveStatus());
    }


    /**
     * @covers \Ouxsoft\LuckByDice\Luck::update
     */
    public function testUpdate()
    {
        // luck decreases
        $this->luck->update(.2);
        $this->assertEquals(5, $this->luck->get());

        // luck increases
        $this->luck->update(.7);
        $this->assertEquals(6, $this->luck->get());

        // luck remains the same
        $this->luck->update(.5);
        $this->assertEquals(6, $this->luck->get());

        // test min / luck less than zero
        $this->luck->set(0);
        $this->luck->update(.01);
        $this->assertLessThanOrEqual(0, $this->luck->get());

        // test max
        $this->luck->adjustment->setMax(1);
        $this->luck->set(1);
        $this->luck->update(1);
        $this->assertEquals(1, $this->luck->get());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::get
     */
    public function testGet()
    {
        $luck = 2;
        $this->luck->set($luck);
        $outcome = $this->luck->get();
        $this->assertEquals($luck, $outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::set
     */
    public function testSet()
    {
        $luck = 2;
        $this->luck->set($luck);
        $outcome = $this->luck->get();
        $this->assertEquals($luck, $outcome);
    }


    /**
     * @covers \Ouxsoft\LuckByDice\Luck::getApplicablePercent
     */
    public function testGetApplicablePercent()
    {
        // if luck < 0
        $luck = -100;
        $this->luck->adjustment->setMin($luck);
        $this->luck->set($luck);
        $outcome = $this->luck->getApplicablePercent();
        $this->assertGreaterThanOrEqual(0, $outcome);
        $this->assertLessThanOrEqual(1, 1 - abs($luck) * 0.01);

        // if luck = 0
        $this->luck->set(0);
        $this->assertEquals((float) 1, $this->luck->getApplicablePercent());

        // if luck > 0
        $luck = 1000;
        $this->luck->set($luck);
        $outcome = $this->luck->getApplicablePercent();

        $this->assertGreaterThanOrEqual(1, $outcome);
        $this->assertLessThanOrEqual(100, 1 + $luck * 0.01);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::modify
     */
    public function testModify()
    {
        $this->luck->set(100);
        $outcome = $this->luck->modify(255);

        $this->assertGreaterThanOrEqual(1, $outcome);
        $this->assertLessThanOrEqual(25500, $outcome);

        // test modify with luck disabled
        $this->luck->disable();
        $outcome = $this->luck->modify(255);
        $this->assertEquals(255, $outcome);
    }
}
