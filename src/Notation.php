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

use Ouxsoft\LuckByDice\Contract\NotationInterface;

/**
 * Class Notation
 * A notation is used to encode and decode a Cup
 * @package Ouxsoft\LuckByDice
 */
class Notation implements NotationInterface
{
    private $separator = ',';

    private $cup;

    /**
     * Notation constructor.
     * @param Cup $cup
     */
    public function __construct(Cup $cup)
    {
        $this->cup = &$cup;
    }

    /**
     * Set cup notation
     * @param string $notation "1d4+3*2,1d5,d5,10d5"
     */
    public function set(string $notation): void
    {
        $this->decode($notation);
    }

    /**
     * Get cup notation
     * @return string "1d4+3*2,1d5,d5,10d5"
     */
    public function get(): string
    {
        return $this->encode();
    }

    /**
     * @see Notation::get()
     */
    public function __toString(): string
    {
        return $this->get();
    }

    /**
     * @param string $separator
     */
    public function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }

    /**
     * @return string
     */
    public function getSeparator(): string
    {
        return $this->separator;
    }

    /**
     * @return string
     */
    private function encode(): string
    {
        $expression = '';
        $firstIteration = true;
        foreach ($this->cup as $collection) {
            if ($firstIteration) {
                $firstIteration = false;
            } else {
                $expression .= $this->separator;
            }

            $amount = count($collection);
            if ($amount > 1) {
                $expression .= $amount;
            }

            $sides = $collection->getSides();
            if ($sides == 100) {
                $expression .= 'd%';
            } else {
                $expression .= 'd' . $sides;
            }

            $modifier = $collection->getModifier();
            if ($modifier > 0) {
                $expression .= '+' . abs($modifier);
            } elseif ($modifier < 0) {
                $expression .= '-' . abs($modifier);
            }

            $multiplier = $collection->getMultiplier();
            if ($multiplier > 1) {
                $expression .= '*' . $multiplier;
            }
        }

        return $expression;
    }

    /**
     * @param string $expression
     */
    private function decode(string $expression): void
    {
        $this->cup->empty();

        $expressionParts = explode($this->separator, strtolower($expression));

        foreach ($expressionParts as $expressionPart) {
            $unsorted = explode('d', $expressionPart);

            $amount = (int) (($unsorted[0] !== '') ? $unsorted[0] : 1);

            $unsorted = explode('*', $unsorted[1]);
            $multiplier = (int) ((isset($unsorted[1])) ? $unsorted[1] : 1);

            $modifier = 0;
            if (strpos($unsorted[0], '+') !== false) {
                $unsorted = explode('+', $unsorted[0]);
                $modifier = (int) ((isset($unsorted[1])) ? $unsorted[1] : 0);
            } elseif (strpos($unsorted[0], '-') !== false) {
                $unsorted = explode('-', $unsorted[0]);
                $modifier = (int) 0 - ((isset($unsorted[1])) ? $unsorted[1] : 0);
            }

            if ($unsorted[0] == '%') {
                $sides = 100;
            } else {
                $sides = (int) $unsorted[0];
            }

            $this->cup[] = new Collection($amount, $sides, $modifier, $multiplier);
        }
    }
}
