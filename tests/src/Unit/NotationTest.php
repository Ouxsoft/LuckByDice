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
use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Cup;

class NotationTest extends TestCase
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
     * @cover \Ouxsoft\LuckByDice\Notation::__construct()
     */
    public function test__construct()
    {
        $this->assertObjectHasAttribute('notation', $this->turn);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Notation::set
     * @covers \Ouxsoft\LuckByDice\Notation::decode
     * @covers \Ouxsoft\LuckByDice\Notation::__toString
     */
    public function testSet()
    {
        $notation = "d4,2d6,3d8+2,4d10*2,5d20+10*2,6d20-2,10d%";
        $this->turn->setNotation($notation);
        $outcome = $this->turn->getNotation();
        $this->assertEquals($notation, $outcome);

        $outcome = (string) $this->turn->getNotation();
        $this->assertEquals($notation, $outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Notation::get
     * @covers \Ouxsoft\LuckByDice\Notation::encode
     */
    public function testGet()
    {
        $notation = "d4,2d6,3d8+2,4d10*2,5d20+10*2,6d20-2,10d%";
        $this->turn->setNotation($notation);
        $outcome = $this->turn->getNotation();
        $this->assertEquals($notation, $outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Notation::setSeparator
     */
    public function testSetSeparator()
    {
        $cup = new Cup();
        $notation = new Notation($cup);
        $separator = ';';
        $notation->setSeparator($separator);
        $this->assertEquals($separator, $notation->getSeparator());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Notation::getSeparator
     */
    public function testGetSeparator()
    {
        $cup = new Cup();
        $notation = new Notation($cup);
        $separator = ';';
        $notation->setSeparator($separator);
        $this->assertEquals($separator, $notation->getSeparator());
    }
}
