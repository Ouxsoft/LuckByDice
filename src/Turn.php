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
     * @var int
     */
    private $total;
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
     * @var array
     */
    private $collectionOutcome;

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
        $total = 0;
        $minPotential = 0;
        $maxPotential = 0;
        $collectionOutcome = [];

        foreach ($this->cup as $collection) {
            $rollOutcome = $collection->roll();

            $total += ($rollOutcome + $collection->getModifier()) * $collection->getMultiplier();

            $collectionOutcome[] = [
                'sides' => $collection->getSides(),
                'dice' => $collection->getLastRollDice(),
                'modifier' => $collection->getModifier(),
                'multiplier' => $collection->getMultiplier(),
                'min' => $collection->getMinPotential(),
                'max' => $collection->getMaxPotential()
            ];

            $outcomePercent = $collection->getOutcomePercent();
            $this->luck->update($outcomePercent);
        }

        // if enabled apply luck to total
        $total = $this->luck->modify($total);

        // TODO: add luck dice
        $this->collectionOutcome = $collectionOutcome;

        $this->total = $total;

        // enforce min limit
        if($this->limitMinRoll) {
            $cupMinPotential = $this->getMinPotential();

            if ($total < $cupMinPotential) {
                $this->total = $cupMinPotential;
            }
        }

        // enforce max limit
        if($this->limitMaxRoll) {
            $cupMaxPotential = $this->getMaxPotential();

            if ($total < $cupMaxPotential) {
                $this->total = $cupMaxPotential;
            }
        }

        return $this->total;
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
     * Gets the last roll collection
     * @return array
     */
    public function getLastRollCollection() : array
    {
        return $this->collectionOutcome;
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
