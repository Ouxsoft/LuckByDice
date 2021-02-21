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

use Laminas\Http\Exception\OutOfRangeException;
use Ouxsoft\LuckByDice\Dice;
use PHPUnit\Framework\TestCase;
use Ouxsoft\LuckByDice\Factory\TurnFactory;

class DiceTest extends TestCase
{
    private $dice;

    public function setUp(): void
    {
        $this->dice = new Dice(6);
    }

    public function tearDown(): void
    {
        unset($this->dice);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Dice::__construct
     */
    public function test__construct()
    {
        $slides = $this->dice->getSides();
        $this->assertEquals(6, $slides);

        $this->expectException(\OutOfRangeException::class);
        $this->dice = new Dice(1);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Dice::roll
     */
    public function testRoll()
    {
        $outcome = $this->dice->roll();
        $this->assertIsInt($outcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Dice::getSides
     */
    public function testGetSides()
    {
        $slides = $this->dice->getSides();
        $this->assertEquals(6, $slides);
    }
}

