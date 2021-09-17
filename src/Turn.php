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

use Ouxsoft\LuckByDice\Contract\TurnInterface;

/**
 * Class Turn
 * A Turn rolls a Cup containing a Collection of Dice
 *
 * @package Ouxsoft\LuckByDice
 */
class Turn implements TurnInterface
{
    /**
     * @var Cup
     */
    private $cup;

    /**
     * @var Notation
     */
    private $notation;

    /**
     * @var Luck
     */
    private $luck;

    /**
     * @var int extra bonuses that could not be absorbed by dice
     */
    private $extraBonus = 0;

    /**
     * Turn constructor.
     * @param Notation $notation
     * @param Cup $cup
     * @param Luck $luck
     * @param string|null $expression
     * @see Turn::setByString()
     */
    public function __construct(
        Notation $notation,
        Cup $cup,
        Luck $luck,
        string $expression = null
    )
    {
        $this->notation = &$notation;
        $this->cup = &$cup;
        $this->luck = &$luck;

        if ($expression !== null) {
            $this->notation->set($expression);
        }
    }

    /**
     * Get the dice notation for the entire cup
     * @return string
     */
    public function getNotation() : string
    {
        return $this->notation->get();
    }

    /**
     * @param $notation
     */
    public function setNotation($notation) : void
    {
        $this->notation->set($notation);
    }

    /**
     * Get Luck
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck->get();
    }

    /**
     * Set Luck
     * @param int $luck
     */
    public function setLuck(int $luck)
    {
        $this->luck->set($luck);
    }


    /**
     * Roll each dice group, update luck, and return outcome with luck modifier applied
     * @return int total
     */
    public function roll(): int
    {
        $value = 0;

        foreach ($this->cup as $collection) {
            // roll each collection
            $collection->roll();

            // get value without modifier and multiplier
            $value += $collection->getValue(false);

            // update luck based on outcome percentage of the collection
            $percent = $collection->getOutcomePercent();
            $this->luck->update($percent);
        }

        // take luck modifier and distribute to dice
        // luck modifies actual dice not modifiers or multipliers
        $amount = $this->luck->modify($value) - $value;
        foreach ($this->cup as $collection) {
            $amount = $collection->setBonus($amount);
        }

        // there is the potential for an amount to still exist after
        // that could be represented as a luck
        // if modifier granter then total add luck dice to outcome only not collection
        $this->extraBonus = $amount;

        return $this->getTotal();
    }

    /**
     * Gets the Cups total which contains the outcome of all Collections of Dice
     * @return int
     */
    public function getTotal(): int
    {
        $total = 0;
        foreach ($this->cup as $collection) {
            $total += $collection->getTotal(true);
        }
        return $total;
    }

    /**
     * Get extra bonuses that could not be absorbed by dice.
     * This could be used for determining critical, etc. in game engines, etc.
     * @return int
     */
    public function getExtraBonus() : int
    {
        return $this->extraBonus;
    }

    /**
     * Get minimum potential of all Collections in Cup
     * @return int
     */
    public function getMinPotential() : int
    {
        $total = 0;
        foreach($this->cup as $collection){
            $total += $collection->getMinPotential();
        }
        return $total;
    }

    /**
     * Get maximum potential of all Collections in Cup
     * @return int
     */
    public function getMaxPotential() : int
    {
        $total = 0;
        foreach($this->cup as $collection){
            $total += $collection->getMaxPotential();
        }
        return $total;
    }

    /**
     * Gets a Cup containing all Collections of Dice
     * @return Cup
     */
    public function getCup() : Cup
    {
        return $this->cup;
    }

}

