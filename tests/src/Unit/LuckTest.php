<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LivingMarkup\Tests\Unit;

use Ouxsoft\LuckByDice\Luck;
use PHPUnit\Framework\TestCase;

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

        // luck less than zero
        $this->luck->set(0);
        $this->luck->update(.1);
        $this->assertLessThanOrEqual(0, $this->luck->get());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::getPhi
     */
    public function testGetPhi()
    {
        $phi = $this->luck->getPhi();
        $this->assertEquals(1.6180339887499, $phi);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Luck::setMax
     */
    public function testSetMax()
    {
        $this->luck->setMax(1);
        $this->luck->update(1);
        $this->luck->update(1);
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
        $luck = 1000;
        $this->luck->set($luck);
        $outcome = $this->luck->getApplicablePercent();

        $this->assertGreaterThanOrEqual(1, $outcome);
        $this->assertLessThanOrEqual(100, $luck * 0.01 + 1);
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
    }
}