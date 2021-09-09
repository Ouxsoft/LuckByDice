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

use \OutOfRangeException;
use Ouxsoft\LuckByDice\Collection;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    private $collection;

    public function setUp(): void
    {
        $this->collection = new Collection(4, 6, 2, 3);
    }

    public function tearDown(): void
    {
        unset($this->collection);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::__construct
     */
    public function test__construct()
    {
        $numberOfDice = $this->collection->count();
        $this->assertEquals(4, $numberOfDice);

        $sides = $this->collection->getSides();
        $this->assertEquals(6, $sides);

        $modifier = $this->collection->getModifier();
        $this->assertEquals(2, $modifier);

        $multiplier = $this->collection->getMultiplier();
        $this->assertEquals(3, $multiplier);

        $this->expectException(OutOfRangeException::class);
        $this->expectExceptionMessage('A collection must have at least one dice.');
        $invalidCollection = new Collection(0, 6);
        unset($invalidCollection);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::count
     */
    public function testCount()
    {
        $count = count($this->collection);
        $this->assertEquals(4, $count);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::roll
     */
    public function testRoll()
    {
        $roll = $this->collection->roll();
        $this->assertGreaterThan(0, $roll);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getModifier
     */
    public function testGetModifier()
    {
        $modifier = $this->collection->getModifier();
        $this->assertEquals(2, $modifier);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getMultiplier
     */
    public function testGetMultiplier()
    {
        $multiplier = $this->collection->getMultiplier();
        $this->assertEquals(3, $multiplier);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getSides
     */
    public function testGetSides()
    {
        $sides = $this->collection->getSides();
        $this->assertEquals(6, $sides);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getMinOutcome
     */
    public function testGetMinOutcome()
    {
        $minOutcome = $this->collection->getMinOutcome();
        $this->assertEquals(4, $minOutcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getMaxOutcome
     */
    public function testGetMaxOutcome()
    {
        $maxOutcome = $this->collection->getMaxOutcome();
        $this->assertEquals(24, $maxOutcome);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getMinPotential
     */
    public function testGetMinPotential()
    {
        $minPotential = $this->collection->getMinPotential();
        $this->assertEquals(18, $minPotential);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getMaxPotential
     */
    public function testGetMaxPotential()
    {
        $maxPotential = $this->collection->getMaxPotential();
        $this->assertEquals(78, $maxPotential);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Collection::getOutcomePercent
     */
    public function testGetOutcomePercent()
    {
        $this->collection->roll();
        $outcomePercent = $this->collection->getOutcomePercent();
        $this->assertGreaterThanOrEqual(0, $outcomePercent);
        $this->assertLessThanOrEqual(1, $outcomePercent);
    }
}
