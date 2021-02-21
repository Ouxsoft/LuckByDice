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

class Notation implements NotationInterface
{
    /**
     * @param Cup $cup
     * @return string
     */
    public function encode(Cup $cup) : string
    {

    }

    /**
     * @param $expression
     * @return array
     */
    public function decode(string $expression): array
    {
        $diceGroups = [];
        $diceGroupExpressions = explode(',', strtolower($expression));

        foreach ($diceGroupExpressions as $diceGroupExpression) {
            $unsorted = explode('d', $diceGroupExpression);

            $amount = (int) (($unsorted[0] !== '') ? $unsorted[0] : 1);

            $unsorted = explode('*', $unsorted[1]);
            $multiplier = (int) ((isset($unsorted[1])) ? $unsorted[1] : 1);

            $unsorted = explode('+', $unsorted[0]);
            $modifier = (int) ((isset($unsorted[1])) ? $unsorted[1] : 0);
            $sides = (int) $unsorted[0];

            $diceGroups[] = new Collection($amount, $sides, $modifier, $multiplier);
        }

        return $diceGroups;
    }
}
