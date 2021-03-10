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
     * @covers \Ouxsoft\LuckByDice\Notation::decode
     */
    public function testDecode()
    {
        $notation = "d4,2d6,3d8+2,4d10*2,5d20+10*2,6d20-2";
        $this->turn->setNotation($notation);
        $outcome = $this->turn->getNotation();
        $this->assertEquals($notation, $outcome);


    }

    /**
     * @covers \Ouxsoft\LuckByDice\Notation::encode
     */
    public function testEncode()
    {
        $notation = "d4,2d6,3d8+2,4d10*2,5d20+10*2,6d20-2";
        $this->turn->setNotation($notation);
        $outcome = $this->turn->getNotation();
        $this->assertEquals($notation, $outcome);
    }
}
