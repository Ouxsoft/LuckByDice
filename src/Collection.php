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

use Countable;
use OutOfRangeException;
use Ouxsoft\LuckByDice\Contract\CollectionInterface;

/**
 * Class Collection
 * A Collection resides inside a Cup and contains one or more Dice with same amount of sides as well as a modifier and
 * a multiplier for the roll outcome.
 * @package Ouxsoft\LuckByDice
 */
class Collection implements
    CollectionInterface,
    Countable
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
     * @var int
     */
    private $sides;
    /**
     * @var
     */
    private $total;
    /**
     * @var array
     */
    private $diceOutcome;

    /**
     * DiceGroup constructor.
     *
     * @param int $sides
     * @param int $amount
     * @param int $modifier
     * @param int $multiplier
     */
    public function __construct(int $amount, int $sides, int $modifier = 1, int $multiplier = 1)
    {
        if ($amount < 1) {
            throw new OutOfRangeException('A collection must have at least one dice.');
        }

        for ($i = 1; $i <= $amount; $i++) {
            $this->dice[] = new Dice($sides);
        }

        $this->sides = $sides;
        $this->modifier = $modifier;
        $this->multiplier = $multiplier;
    }

    /**
     * @return int
     */
    public function count() : int
    {
        return count($this->dice);
    }

    /**
     * Roll each dice for total then add modifier and apply multiplier
     *
     * @return int
     */
    public function roll() : int
    {
        $total = 0;
        $diceOutcome = [];

        foreach ($this->dice as $dice) {
            $roll = $dice->roll();
            $total += $roll;
            $diceOutcome[] = [
                'roll' => $roll,
                'sides' => $dice->getSides()
            ];
        }

        // store last total
        $this->total = $total;
        $this->diceOutcome = $diceOutcome;

        return $this->total;
    }

    /**
     * Get dice from last roll
     * @return array
     */
    public function getLastRollDice() : array
    {
        return $this->diceOutcome;
    }

    /**
     * @return int
     */
    public function getModifier() : int
    {
        return $this->modifier;
    }

    /**
     * @return int
     */
    public function getMultiplier() : int
    {
        return $this->multiplier;
    }

    /**
     * @return int
     */
    public function getSides() : int
    {
        return $this->sides;
    }

    /**
     * Get min potential of outcome
     * @return int
     */
    public function getMinOutcome() : int
    {
        return (count($this->dice) * 1);
    }

    /**
     * Get max potential of outcome
     * @return int
     */
    public function getMaxOutcome() : int
    {
        return (count($this->dice) * $this->sides);
    }

    /**
     * Compute percent outcome of previous roll
     * @return float
     */
    public function getOutcomePercent() : float
    {
        /*
         * Convert dice outcomes to percent outcomes.
         * Start counts at 0 opposed to 1 as dice outcomes start
         * Example using 1d4: 1/4 = 0/3; 2/4 = 1/3; 3/4 = 2/3; 4/4 = 3/3
         */
        return ($this->total - $this->count()) / ($this->getMaxOutcome() - $this->count());
    }

}
