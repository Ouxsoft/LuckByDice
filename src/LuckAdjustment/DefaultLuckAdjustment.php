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

/**
 * Class DefaultLuckAdjustment
 * @package Ouxsoft\LuckByDice\LuckAdjustment
 *
 * Based on the Golden Ratio / Phi
 */
class DefaultLuckAdjustment extends AbstractLuckAdjustment
{
    /**
     * Get Phi / The Golden Ratio
     * @return float
     */
    public function getPhi() : float
    {
        return (1 + sqrt(5)) / 2;
    }

    /**
     * Update luck based on percentage of roll outcome
     * @param float $rollPercent min 0 to max 1
     * @return int
     */
    public function getAdjustment(float $rollPercent = 0.5) : int
    {
        $phi = $this->getPhi();

        if ($rollPercent >= (1/$phi) ) {
            return 1;
        }

        if($rollPercent <= (1 - (1/$phi)) ) {
            return -1;
        }

        return 0;
    }
}