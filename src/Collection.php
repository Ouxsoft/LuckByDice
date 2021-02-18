<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Ouxsoft\LuckByDice;

/**
 * Class Collection
 * A collection resides inside a cup and contains one or more dice with same amount of sides that can be later rolled.
 * @package Ouxsoft\LuckByDice
 */
class Collection
{
    /**
     * @var array
     */
    private $dice = [];
    /**
     * @var int
     */
    private $modifier;
    /**
     * @var int
     */
    private $multiplier;

    /**
     * DiceGroup constructor.
     *
     * @param int $sides
     * @param int $amount
     * @param int $modifier
     * @param int $multiplier
     */
    public function __construct(int $amount, int $sides, int $modifier, int $multiplier)
    {
        if ($amount < 1) {
            throw new OutOfRangeException('A DiceGroup must have at least one dice.');
        }

        for ($i = 0; $i <= $amount; $i++) {
            $this->dice[] = new Dice($sides);
        }
        $this->modifier = $modifier;
        $this->multiplier = $multiplier;
    }

    /**
     * Roll each dice for total then add modifier and apply multiplier
     *
     * @return int
     */
    public function roll() : int
    {
        $total = 0;

        foreach ($this->dice as $dice) {
            $total += $dice->roll();
        }

        $total += $this->modifier;
        $total *= $this->multiplier;

        return $total;
    }
}
