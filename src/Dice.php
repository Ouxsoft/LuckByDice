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
 * A dice has two or more sides, can be roll, and features a value after rolling
 * @package Ouxsoft\LuckByDice
 */
class Dice implements DiceInterface
{
    /**
     * @var int the total number of difference sides marked with dots/pips
     */
    private $sides;

    /**
     * @var int the state of the roll. What number is on the surface after a roll. An unrolled dice has no value
     *          the value is not the total as a dices face value may be modified by luck algorithms
     */
    private $value;

    /**
     * @var int the amount to change the dices value based on luck
     */
    private $bonus;

    /**
     * @return int
     */
    public function getBonus(): int
    {
        return $this->bonus;
    }

    /**
     * @param int $bonus
     */
    public function setBonus(int $bonus): void
    {
        $this->bonus = $bonus;
    }

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
        $this->value = mt_rand(1, $this->sides);
        return $this->value;
    }

    /**
     * @return int
     */
    public function getSides(): int
    {
        return $this->sides;
    }

    /**
     * @param int $sides
     */
    public function setSides(int $sides): void
    {
        $this->sides = $sides;
    }

    /**
     * @return int
     */
    public function getValue(): ?int
    {
        return $this->value;
    }

    /**
     * The dices value with bonus from luck applied
     *
     * @return int|null
     */
    public function getTotal(): int
    {
        return $this->value + $this->bonus;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value): void
    {
        $this->value = $value;
    }

}
