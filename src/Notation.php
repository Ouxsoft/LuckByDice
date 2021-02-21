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
    /**
     * @param Cup $cup
     * @return string
     */
    public function encode(Cup $cup) : string
    {
        $expression = '';
        $firstIteration = true;
        foreach ($cup as $collection) {
            if ($firstIteration) {
                $firstIteration = false;
            } else {
                $expression .= ',';
            }

            $amount = count($collection);
            if ($amount > 1) {
                $expression .= $amount;
            }

            $expression .= 'd' . $collection->getSides();

            $modifier = $collection->getModifier();
            if ($modifier > 1) {
                $expression .= '+' . $modifier;
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
     * @return Cup
     */
    public function decode(string $expression): Cup
    {
        $cup = new Cup();

        $expressionParts = explode(',', strtolower($expression));

        foreach ($expressionParts as $expressionPart) {
            $unsorted = explode('d', $expressionPart);

            $amount = (int) (($unsorted[0] !== '') ? $unsorted[0] : 1);

            $unsorted = explode('*', $unsorted[1]);
            $multiplier = (int) ((isset($unsorted[1])) ? $unsorted[1] : 1);

            $unsorted = explode('+', $unsorted[0]);
            $modifier = (int) ((isset($unsorted[1])) ? $unsorted[1] : 0);
            $sides = (int) $unsorted[0];

            $cup[] = new Collection($amount, $sides, $modifier, $multiplier);
        }

        return $cup;
    }
}