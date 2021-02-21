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
     * Turn constructor.
     * @param Notation $notation
     * @param Cup $cup
     * @param string|null $expression
     * @see Turn::setByString()
     */
    public function __construct(
        Notation $notation,
        Cup $cup,
        string $expression = null
    ) {
        $this->notation = $notation;
        $this->cup = $cup;

        if ($expression !== null) {
            $this->set($expression);
        }
    }

    /**
     * Set dice notation
     * @param string $expression "1d4+3*2,1d5,d5,10d5"
     */
    public function set(string $expression) : void
    {
        $this->cup = $this->notation->decode($expression);
    }

    /**
     * Roll each dice group and total
     * @return int
     */
    public function roll() : int
    {
        $total = 0;

        foreach ($this->cup as $diceGroup) {
            $total += $diceGroup->roll();
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