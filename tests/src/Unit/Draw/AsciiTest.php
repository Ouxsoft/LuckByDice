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

use Ouxsoft\LuckByDice\Draw\Ascii;
use Ouxsoft\LuckByDice\Factory\TurnFactory;
use PHPUnit\Framework\TestCase;

class AsciiTest extends TestCase
{
    public function setUp(): void
    {
        $this->draw = new Ascii();
    }

    public function tearDown(): void
    {
        unset($this->draw);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Draw\Ascii::cup
     */
    public function testCup()
    {
        $this->assertIsString($this->draw->cup(2));
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Draw\Ascii::dice
     */
    public function testDice()
    {
        $this->assertIsArray($this->draw->dice(4,6,6));
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Draw\Ascii::collection
     */
    public function testCollection()
    {
        $turn = TurnFactory::getInstance();
        $turn->notation->set('10d6,1d2+12*2,3d3,d%');
        $turn->roll();
        foreach($turn->getCup() as $collection){
            $this->assertIsString($this->draw->collection($collection));
        }
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Draw\Ascii::scale
     */
    public function testScale()
    {
        $this->assertIsString($this->draw->scale(2,20));
    }
}