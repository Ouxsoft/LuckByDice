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
 * A turn is used to set and hold dice.
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
    public $notation;
    /**
     * @var Luck
     */
    private $luck;
    /**
     * @var bool whether total with luck applied may be less than min dice potential
     */
    private $limitMinRoll = false;
    /**
     * @var bool whether total with luck applied may greater than max dice potential
     */
    private $limitMaxRoll = false;

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
    ) {
        $this->notation = &$notation;
        $this->cup = &$cup;
        $this->luck = &$luck;

        if ($expression !== null) {
            $this->notation->set($expression);
        }
    }

    /**
     * Get Luck
     * @return int
     */
    public function getLuck() : int
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
     * Set whether outcome modified by luck can exceed max dice potential
     * @param bool $limitMinRoll
     */
    public function setLimitMinRoll(bool $limitMinRoll) : void
    {
        $this->limitMinRoll = $limitMinRoll;
    }

    /**
     * Get whether a limit is set on min roll
     */
    public function getLimitMinRoll() : bool
    {
        return $this->limitMinRoll;
    }

    /**
     * Set whether outcome modified by luck can exceed max dice potential
     * @param bool $limitMaxRoll
     */
    public function setLimitMaxRoll(bool $limitMaxRoll) : void
    {
        $this->limitMaxRoll = $limitMaxRoll;
    }

    /**
     * Get whether a limit is set on max roll
     */
    public function getLimitMaxRoll() : bool
    {
        return $this->limitMaxRoll;
    }

    /**
     * Roll each dice group, update luck, and return outcome with luck modifier applied
     * @return int total
     */
    public function roll() : int
    {
        $value = 0;

        foreach($this->cup as $collection) {
            // roll each collection
            $collection->roll();

            $value += $collection->getValue();

            // update luck based on outcome percentage of the collection
            $percent = $collection->getOutcomePercent();
            $this->luck->update($percent);
        }

        // take luck modifier and distribute to dice
        // luck modifies actual dice not modifiers or multipliers
        $amount = $this->luck->modify($value) - $value;
        foreach($this->cup as $collection){
            $amount = $collection->setBonus($amount);
        }

        // TODO: add luck dice
        // there is the potential for an amount to still exist
        // that could be represented as a luck
        // if modifier granter then total add luck dice to outcome only not collection

        return $this->getTotal();
    }

    public function getTotal() : int
    {
        $total = 0;
        foreach($this->cup as $collection){
            $total += $collection->getTotal();
        }
        return $total;
    }

    public function getTotalWithoutLuckAdjustments() : int
    {
    }

    /**
     * Get minimum potential of all collections in cup
     *
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
     * Get maximum potential of all collections in cup
     *
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
     * Gets a Cup containing all Collections
     * @return Cup
     */
    public function getCup() : Cup
    {
        return $this->cup;
    }

    /**
     * @return string
     */
    public function getNotation() : string
    {
        return $this->notation->get();
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->total;
    }
}
