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
use Ouxsoft\LuckByDice\Contract\OutcomeInterface;

/**
 * Class Collection
 * A Collection resides inside a Cup and contains one or more Dice with same amount of sides.
 * A Collection also features a modifier and a multiplier for the roll outcome.
 * A Collection only contains an Outcome of all dice contained within after it has been rolled.
 * @package Ouxsoft\LuckByDice
 */
class Collection implements
    CollectionInterface,
    Countable
{
    /**
     * @var array
     */
    public $dice = [];

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
     * Collection constructor.
     * @param int $amount
     * @param int $sides
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
     * Roll each dice and returns Total
     *
     * @return int
     */
    public function roll() : int
    {
        foreach ($this->dice as &$dice) {
            $dice->roll();
        }

        return $this->getTotal();
    }

    /**
     * Gets an array containing Dice
     * @return array
     */
    public function getDice() : array
    {
        return $this->dice;
    }

    /**
     * Get value of rolled dice without modifier or multiplier
     * @return int
     */
    public function getValue() : int
    {
        $value = 0;
        foreach($this->dice as $dice){
            $value += $dice->getValue();
        }
        return $value;
    }

    /**
     * Get bonus of dice without modifier or multiplier
     * @return int
     */
    public function getBonus() : int
    {
        $bonus = 0;
        foreach($this->dice as $dice){
            $bonus += $dice->getBonus();
        }
        return $bonus;
    }

    /**
     * Distributes a new bonus across all dice
     * @param int $amount
     * @return int returns the remaining bonus amount left to distribute
     */
    public function setBonus(int $amount) : int
    {
        // distribute bonus to all dice
        foreach($this->dice as &$dice) {
            if($amount == 0) {
                $dice->setBonus(0);
                continue;
            }

            // a dices bonus may not exceed the amount of sides
            $bonus = $dice->getSides() - $dice->getValue();
            if($amount > $bonus){
                $dice->setBonus($bonus);
                $amount -= $bonus;
            } else {
                $dice->setBonus($amount);
                $amount = 0;
            }
        }

        // distribute bonus by rearranging dice
        shuffle($this->dice);

        return $amount;
    }

    /**
     * Gets total value of each dice within Collection with modifier and multiplier applied
     * @return int
     */
    public function getTotal() : int
    {
        $total = 0;
        foreach($this->dice as $dice){
            $total += $dice->getTotal();
        }
        return ($total + $this->getModifier()) * $this->getMultiplier();
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
        return $this->count();
    }

    /**
     * Get max potential of outcome
     * @return int
     */
    public function getMaxOutcome() : int
    {
        return ($this->count() * $this->sides);
    }

    /**
     * Compute percent outcome of previous roll
     *
     * Convert dice outcomes to percent outcomes.
     * Dice outcomes start counting at one. This formula works by starting the counts at 0.
     * Example using 1d4: 1/4 = 0/3; 2/4 = 1/3; 3/4 = 2/3; 4/4 = 3/3
     *
     * @return float
     */
    public function getOutcomePercent() : float
    {
        return ($this->getValue() - $this->count()) / ($this->getMaxOutcome() - $this->count());
    }

    /**
     * Get the minimum potential of a collections
     *
     * Takes into account minimal outcome, modifier, and multiplier
     *
     * @return int
     */
    public function getMinPotential() : int
    {
        return ($this->getMinOutcome() + $this->getModifier()) * $this->getMultiplier();
    }

    /**
     * Get the maximum potential of a collections
     *
     * Takes into account maximum outcome, modifier, and multiplier
     *
     * @return int
     */
    public function getMaxPotential() : int
    {
        return ($this->getMaxOutcome() + $this->getModifier()) * $this->getMultiplier();
    }

    /**
     * Get the notation for the collection
     * @return string
     */
    public function getNotation() : string
    {
        return $this->count() . 'd' .
            $this->getSides() . '+' .
            $this->getModifier() . '*' .
            $this->getMultiplier();
    }
}
