<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDiceTests\Unit\Factory;

use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\Turn;
use PHPUnit\Framework\TestCase;

class TurnFactoryTest extends TestCase
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
     * @covers \Ouxsoft\LuckByDice\Factory\TurnFactory::getInstance
     */
    public function testGetInstance()
    {
        $this->assertInstanceOf(Turn::class, $this->turn);
    }
}
