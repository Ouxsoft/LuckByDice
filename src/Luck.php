<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDice;

use Ouxsoft\LuckByDice\Contract\LuckInterface;

class Luck implements LuckInterface
{
    /**
     * @var int
     */
    private $luck;
    /**
     * @var int
     */
    private $phi;

    /**
     * Luck constructor.
     * @param int $luck
     */
    public function __construct(int $luck = 0)
    {
        $this->phi = $this->getPhi();
        $this->luck = $luck;
    }

    /**
     * Update luck based on percentage of roll outcome
     * @param float $rollPercent min 0 to max 1
     */
    public function update(float $rollPercent = 0.5) : void
    {
        $low = (1 - (1/$this->phi));
        $high = (1/$this->phi);

        if($rollPercent <= $low) {
            $this->luck--;
        } elseif ($rollPercent >= $high) {
            $this->luck++;
        }

        if($this->luck < 0){
            $this->luck = 0;
        }
    }

    /**
     * Get Phi / The Golden Ratio
     * @return float
     */
    public function getPhi() : float
    {
        return (1 + sqrt(5)) / 2;
    }

    /**
     * @return int
     */
    public function get() : int
    {
        return $this->luck;
    }

    /**
     * @param int $luck
     */
    public function set(int $luck) : void
    {
        $this->luck = $luck;
    }
}