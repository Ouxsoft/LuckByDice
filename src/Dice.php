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

use Ouxsoft\LuckByDice\Contract\DiceInterface;
use OutOfRangeException;

/**
 * Class Dice
 * A dice has two or more sides and can be roll
 * @package Ouxsoft\LuckByDice
 */
class Dice implements DiceInterface
{
    private $sides;

    /**
     * Dice constructor.
     * @param $sides
     */
    public function __construct($sides)
    {
        if ($sides <= 1) {
            throw new OutOfRangeException('Dice must have at least 2 sides.');
        }

        $this->sides = $sides;
    }

    /**
     * @return int
     */
    public function roll() : int
    {
        return mt_rand(1, $this->sides);
    }

    /**
     * @return int
     */
    public function getSides() : int
    {
        return $this->sides;
    }
}
