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

use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Collection;
use PHPUnit\Framework\TestCase;

class CupTest extends TestCase
{
    private $cup;

    public function setUp(): void
    {
        $this->cup = new Cup();
        $this->cup[] = new Collection(1, 6, 1, 1);
        $this->cup[] = new Collection(1, 8, 1, 1);
    }

    public function tearDown(): void
    {
        unset($this->cup);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::empty
     */
    public function testEmpty()
    {
        $this->cup->empty();
        $this->assertArrayNotHasKey(0, $this->cup);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::offsetExists
     */
    public function testOffsetExists()
    {
        $this->assertTrue($this->cup->offsetExists(1));
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::offsetGet
     */
    public function testOffsetGet()
    {
        $collection = new Collection(1, 8, 1, 1);
        $this->assertEquals($collection, $this->cup->offsetGet(1));
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::offsetSet
     */
    public function testOffsetSet()
    {
        $collection = new Collection(1, 8, 1, 1);
        $this->cup[] = $collection;
        $this->assertEquals($collection, $this->cup->offsetGet(2));

        $this->cup['test'] = $collection;
        $this->assertEquals($collection, $this->cup->offsetGet('test'));
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::offsetUnset
     */
    public function testOffsetUnset()
    {
        $this->cup->offsetUnset('k');
        $this->assertArrayNotHasKey('k', $this->cup);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::current
     */
    public function testCurrent()
    {
        $current = $this->cup->current();
        $this->assertInstanceOf(Collection::class, $current);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::next
     */
    public function testNext()
    {
        $this->cup->next();
        $key = $this->cup->key();
        $this->assertEquals(1, $key);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::key
     */
    public function testKey()
    {
        $key = $this->cup->key();
        $this->assertEquals(0, $key);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::valid
     */
    public function testValid()
    {
        $this->assertTrue($this->cup->valid());
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::rewind
     */
    public function testRewind()
    {
        $this->cup->next();
        $this->cup->rewind();
        $key = $this->cup->key();
        $this->assertEquals(0, $key);
    }

    /**
     * @covers \Ouxsoft\LuckByDice\Cup::reverse
     */
    public function testReverse()
    {
        $this->cup->reverse();

        $key = $this->cup->key();
        $this->assertEquals(0, $key);
    }

}
