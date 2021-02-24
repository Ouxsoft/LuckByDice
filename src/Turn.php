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
    private $notation;
    /**
     * @var int
     */
    private $total;
    /**
     * @var Luck
     */
    private $luck;

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
        $this->notation = $notation;
        $this->cup = $cup;
        $this->luck = $luck;

        if ($expression !== null) {
            $this->setNotation($expression);
        }
    }

    /**
     * Set cup notation
     * @param string $notation "1d4+3*2,1d5,d5,10d5"
     */
    public function setNotation(string $notation) : void
    {
        $this->cup = $this->notation->decode($notation);
    }

    /**
     * Get cup notation
     * @return string "1d4+3*2,1d5,d5,10d5"
     */
    public function getNotation() : string
    {
        return $this->notation->encode($this->cup);
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
     * Roll each dice group and total
     * @return int
     */
    public function roll() : int
    {
        $total = 0;

        foreach ($this->cup as $collection) {
            $rollOutcome = $collection->roll();
            $rollMax = $collection->getMaxOutcome();
            $this->luck->update($rollOutcome, $rollMax);
            $total += $rollOutcome;
        }

        $this->total = $total;

        return $this->total;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->total;
    }
}
