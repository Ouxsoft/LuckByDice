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
     * @param $rollOutcome
     * @param $rollMax
     */
    public function update($rollOutcome, $rollMax) : void
    {
        $rollPercent = ($rollOutcome/$rollMax);

        // 0.38196601125
        if($rollPercent < (1 - (1/$this->phi))) {
            $this->luck--;
        // 0.61803398875
        } elseif ($rollPercent > (1/$this->phi)) {
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