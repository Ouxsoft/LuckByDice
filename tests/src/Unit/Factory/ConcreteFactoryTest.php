<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LivingMarkup\Tests\Unit\Factory;

use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Factory\ConcreteFactory;
use Ouxsoft\LuckByDice\Luck;
use Ouxsoft\LuckByDice\Notation;
use PHPUnit\Framework\TestCase;

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

    /**
     * @covers \Ouxsoft\LuckByDice\Factory\ConcreteFactory::makeNotation
     */
    public function testMakeNotation()
    {
        $this->assertInstanceOf(Notation::class, $this->abstractFactory->makeNotation());
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