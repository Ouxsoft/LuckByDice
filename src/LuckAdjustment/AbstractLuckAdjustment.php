<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDice\LuckAdjustment;

use Ouxsoft\LuckByDice\Contract\LuckAdjustmentInterface;

/**
 * Class AbstractLuckAdjustment
 * @package Ouxsoft\LuckByDice\LuckAdjustment
 *
 * An abstract class for getting adjustments to luck based on roll outcome.
 * This class is an abstract class to allow classes that extend from it
 * to define the adjustment algorithms while decoupling min and max logic.
 */
abstract class AbstractLuckAdjustment implements LuckAdjustmentInterface
{
    /**
     * @var int the minimum value allowed for luck
     */
    private $min = 0;
    /**
     * @var int the maximum value allowed for luck
     */
    private $max = 2147483647;

    /**
     * Set max
     * @param int $max
     * @return void
     */
    public function setMax(int $max): void
    {
        $this->max = $max;
    }

    /**
     * Get max
     * @return int
     */
    public function getMax(): int
    {
        return $this->max;
    }

    /**
     * Set min
     * @param int $min
     * @return void
     */
    public function setMin(int $min): void
    {
        $this->min = $min;
    }

    /**
     * Get min
     * @return int
     */
    public function getMin(): int
    {
        return $this->min;
    }

    /**
     * Get name of adjustment class
     * @return string
     */
    public function getName(): string
    {
        return static::class;
    }

    /**
     *
     * @param int $currentLuck
     * @param float $rollPercent
     * @return int
     */
    public function run(int $currentLuck, float $rollPercent = 0.5): int
    {
        $adjustment = $this->getAdjustment($rollPercent);

        $adjustedLuck = ($currentLuck + $adjustment);

        if ($adjustedLuck < $this->min) {
            // Return the amount of adjustment it would take for currentLuck
            // to equal min
            return ($this->min - $currentLuck);
        } elseif ($adjustedLuck > $this->max) {
            // Return the amount of adjustment it would take for currentLuck
            // to equal max
            return ($this->max - $currentLuck);
        }

        return $adjustment;
    }

    /**
     * Update luck based on percentage of roll outcome
     * @param float $rollPercent min 0 to max 1
     * @return int
     */
    abstract public function getAdjustment(float $rollPercent = 0.5): int;
}
