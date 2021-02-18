<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDice;

use ArrayAccess;
use Iterator;

/**
 * Cup
 * A cup contains Collection of dice
 *
 * @package Ouxsoft\LivingMarkup
 */
class Cup implements
    \Iterator,
    \ArrayAccess
{
    private $container = [];
    private $index = 0;

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->container);
    }

    public function offsetGet($offset)
    {
        return $this->container[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->container[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function current(): int
    {
        return $this->container[$this->index];
    }

    public function next()
    {
        $this->index ++;
    }

    public function key()
    {
        return $this->index;
    }

    public function valid()
    {
        return isset($this->container[$this->key()]);
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function reverse()
    {
        $this->container = array_reverse($this->container);
        $this->rewind();
    }
}
