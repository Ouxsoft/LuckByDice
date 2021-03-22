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

class FickleLuckAdjustment extends AbstractLuckAdjustment
{
    /**
     * Update luck based on percentage of roll outcome
     * @param float $rollPercent min 0 to max 1
     * @return int
     */
    public function getAdjustment(float $rollPercent = 0.5) : int
    {
        if($rollPercent <=.1) {
            return -2;
        } elseif ($rollPercent <=.2) {
            return -1;
        } elseif ($rollPercent >=.8) {
            return 1;
        } elseif($rollPercent >=.9) {
            return 2;
        }

        return 0;
    }
}
