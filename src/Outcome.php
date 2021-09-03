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

use Ouxsoft\LuckByDice\Contract\OutcomeInterface;

/**
 * Outcome
 * A outcome contains the results of dice rolled.
 *
 * @package Ouxsoft\LuckByDice
 */
class Outcome implements OutcomeInterface
{
    /**
     * @var int the minimal that an outcome can be
     */
    private $min;

    /**
     * @var int the maximum that an outcome can be
     */
    private $max;

    /**
     * @var array
     */
    private $dice;

    public function __construct(array $dice)
    {


    }

    /**
     * Get the minimim potential of the outcome
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * Set min potential of outcome
     * @param int $min
     */
    public function setMin(int $min): void
    {
        $this->min = $min;
    }

    /**
     * Get the maximum potential of the outcome
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * Set min potential of outcome
     * @param int $max
     */
    public function setMax(int $max): void
    {
        $this->max = $max;
    }

    /**
     * Set a dice in the outcome
     * @param Dice $dice
     */
    public function setDice(Dice $die) : void
    {
        $this->dice[] = $die;
    }

    /**
     * Get the dice within the outcome
     * @return array
     */
    public function getDice() : array
    {
        return $this->dice;
    }

}


