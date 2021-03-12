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
     * @var int an elusive modifier based on random over time
     */
    private $luck;
    /**
     * @var int the golden ration computed during runtime
     */
    private $phi;
    /**
     * @var int the maximum value allowed for luck
     */
    private $max;
    /**
     * @var int the minimum value allowed for luck
     */
    private $min;

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

        if($this->luck < $this->min){
            $this->luck = $this->min;
        }

        if (
            isset($this->max)
            && ($this->luck > $this->max)
        ) {
            $this->luck = $this->max;
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
     * Set max
     * @param int $max
     * @return void
     */
    public function setMax(int $max) : void
    {
        $this->max = $max;
    }

    /**
     * Set min
     * @param int $min
     * @return void
     */
    public function setMin(int $min) : void
    {
        $this->min = $min;
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

    /**
     * Get applicable luck as random percentage based on current luck
     *
     * @return float
     */
    public function getApplicablePercent() : float
    {
        if($this->luck <= 0){
            return 1 - mt_rand(0, abs($this->luck)) * .01;
        } else if($this->luck == 0){
            return 1;
        }

        return 1 + mt_rand(0, abs($this->luck)) * .01;
    }

    /**
     * Modifies a number based on current luck
     *
     * @param int $number
     * @return int
     */
    public function modify(int $number) : int
    {
        $number *= $this->getApplicablePercent();

        return (int) round($number, 0,PHP_ROUND_HALF_UP);
    }
}