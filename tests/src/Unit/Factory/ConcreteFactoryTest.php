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

use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Factory\ConcreteFactory;
use Ouxsoft\LuckByDice\Luck;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Contract\AbstractFactoryInterface;
use PHPUnit\Framework\TestCase;
use Ouxsoft\LuckByDice\Factory\Container;

class ConcreteFactoryTest extends TestCase
{
    private $abstractFactory;

    public function setUp(): void
    {
        $this->abstractFactory = new ConcreteFactory();
    }

    public function tearDown(): void
    {
        unset($this->abstractFactory);
    }

    public function testInterface()
    {
        $this->assertInstanceOf(AbstractFactoryInterface::class, $this->abstractFactory);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Factory\ConcreteFactory::makeNotation
     */
    public function testMakeNotation()
    {
        $container = new Container();
        $container['cup'] = new Cup();
        $this->assertInstanceOf(Notation::class, $this->abstractFactory->makeNotation($container));
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Factory\ConcreteFactory::makeCup
     */
    public function testMakeCup()
    {
        $this->assertInstanceOf(Cup::class, $this->abstractFactory->makeCup());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Factory\ConcreteFactory::makeLuck
     */
    public function testMakeLuck()
    {
        $this->assertInstanceOf(Luck::class, $this->abstractFactory->makeLuck());
    }
}