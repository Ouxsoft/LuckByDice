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

use Ouxsoft\LuckByDice\Turn;
use PHPUnit\Framework\TestCase;
use Ouxsoft\LuckByDice\Factory\TurnFactory;

class TurnTest extends TestCase
{
    private $turn;

    public function setUp(): void
    {
        $this->turn = TurnFactory::getInstance();
    }

    public function tearDown(): void
    {
        unset($this->turn);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::__construct
     */
    public function test__construct() {
        $this->assertInstanceOf(Turn::class, $this->turn);

        $notation = 'd6';
        $this->turn = TurnFactory::getInstance($notation);
        $outcome = $this->turn->notation->get();
        $this->assertEquals($notation, $outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::getLuck
     */
    public function testGetLuck()
    {
        $luck = 3;
        $this->turn->setLuck($luck);
        $outcome = $this->turn->getLuck();
        $this->assertEquals($outcome, $luck);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::setLuck
     */
    public function testSetLuck()
    {
        $luck = 2;
        $this->turn->setLuck($luck);
        $outcome = $this->turn->getLuck();
        $this->assertEquals($outcome, $luck);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::roll
     */
    public function testRoll()
    {
        $this->turn->notation->set('1d4,2d5,6d6+3,d5*2');
        $outcome = $this->turn->roll();
        $this->assertIsInt($outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::setLimitMinRoll
     */
    public function testSetLimitMinRoll()
    {
        $this->turn->setLimitMinRoll(true);
        $this->assertTrue($this->turn->getLimitMinRoll());

        $this->turn->setLimitMinRoll(false);
        $this->assertFalse($this->turn->getLimitMinRoll());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::getLimitMinRoll
     */
    public function testGetLimitMinRoll()
    {
        $this->turn->setLimitMinRoll(true);
        $this->assertTrue($this->turn->getLimitMinRoll());

        $this->turn->setLimitMinRoll(false);
        $this->assertFalse($this->turn->getLimitMinRoll());
    }


    /**
     * @covers \Ouxsoft\LuckByDice\Turn::setLimitMaxRoll
     */
    public function testSetLimitMaxRoll()
    {
        $this->turn->setLimitMaxRoll(true);
        $this->assertTrue($this->turn->getLimitMaxRoll());

        $this->turn->setLimitMaxRoll(false);
        $this->assertFalse($this->turn->getLimitMaxRoll());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::getLimitMaxRoll
     */
    public function testGetLimitMaxRoll()
    {
        $this->turn->setLimitMaxRoll(true);
        $this->assertTrue($this->turn->getLimitMaxRoll());

        $this->turn->setLimitMaxRoll(false);
        $this->assertFalse($this->turn->getLimitMaxRoll());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::__toString
     */
    public function test__toString()
    {
        $this->turn->notation->set('d6');
        $outcome = (string) $this->turn;
        $this->assertIsString($outcome);
    }
}
