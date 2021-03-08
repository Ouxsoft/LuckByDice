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

use Ouxsoft\LuckByDice\Factory\ConcreteFactory;
use Ouxsoft\LuckByDice\Factory\ContainerFactory;
use PHPUnit\Framework\TestCase;
use Pimple\Container;

class ContainerFactoryTest extends TestCase
{
    private $container;

    public function setUp(): void
    {
        $abstractFactory = new ConcreteFactory();
        $this->container = ContainerFactory::buildContainer($abstractFactory);
    }

    public function tearDown(): void
    {
        unset($this->container);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Factory\TurnFactory::getInstance
     */
    public function testGetInstance()
    {
        $this->assertInstanceOf(Container::class, $this->container);
    }
}