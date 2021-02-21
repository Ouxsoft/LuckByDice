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
     * @covers \Ouxsoft\LuckByDice\Turn::set
     */
    public function testSet()
    {
        $this->turn->set("d3+3*3");
        $outcome = $this->turn->roll();
        $this->assertIsInt($outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::roll
     */
    public function testRoll()
    {
        $this->turn->set("1d4,2d5,6d6+3,d5*2");
        $outcome = $this->turn->roll();
        $this->assertIsInt($outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Turn::__toString
     */
    public function test__toString()
    {
        $this->turn->set("d6");
        $outcome = (string) $this->turn;
        $this->assertIsString($outcome);
    }
}
