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
use Ouxsoft\LuckByDice\Contract\CollectionInterface;

/**
 * Cup
 * A dice Cup holds and allows iteration of one ore more dice Collection
 *
 * @package Ouxsoft\LivingMarkup
 */
class Cup implements
    \Iterator,
    \ArrayAccess
{
    private $container = [];
    private $index = 0;

    public function empty() : void
    {
        $this->container = [];
        $this->index = 0;
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->container);
    }

    /**
     * @param mixed $offset
     * @return CollectionInterface
     */
    public function offsetGet($offset) : CollectionInterface
    {
        return $this->container[$offset];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) : void
    {
        if ($offset === null) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) : void
    {
        unset($this->container[$offset]);
    }

    /**
     * @return CollectionInterface
     */
    public function current() : CollectionInterface
    {
        return $this->container[$this->index];
    }

    public function next() : void
    {
        $this->index++;
    }

    /**
     * @return int
     */
    public function key() : int
    {
        return $this->index;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->container[$this->key()]);
    }

    public function rewind() : void
    {
        $this->index = 0;
    }

    public function reverse() : void
    {
        $this->container = array_reverse($this->container);
        $this->rewind();
    }
}
