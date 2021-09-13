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
use Ouxsoft\LuckByDice\LuckAdjustment\DefaultLuckAdjustment;
use Ouxsoft\LuckByDice\LuckAdjustment\FickleLuckAdjustment;

class Luck implements LuckInterface
{
    /** @var int DefaultLuckAdjustment */
    const DEFAULT_ADJUSTMENT = 0;

    /** @var int FickleLuckAdjustment */
    const FICKLE_ADJUSTMENT = 1;

    /**
     * @var int an elusive modifier based on random over time
     */
    protected $luck = 0;
    /**
     * @var bool used to determine whether luck is enabled or disabled
     */
    private $active = true;
    /**
     * @var AlgorithmInterface
     */
    public $adjustment;

    /**
     * Luck constructor.
     * @param int $luck
     */
    public function __construct(int $luck = 0)
    {
        $this->setAdjustment();
        $this->set($luck);
    }

    /**
     * Enable luck
     */
    public function enable() : void
    {
        $this->active = true;
    }

    /**
     * Disable luck
     */
    public function disable() : void
    {
        $this->active = false;
    }

    /**
     * Get whether enabled or disabled
     * @return bool
     */
    public function getActiveStatus() : bool
    {
        return $this->active;
    }

    /**
     * Set the luck adjustment algorithm
     * @param int $algorithm
     */
    public function setAdjustment(int $algorithm = self::DEFAULT_ADJUSTMENT) : void
    {
        switch($algorithm){
            case self::FICKLE_ADJUSTMENT:
                $this->adjustment = new FickleLuckAdjustment();
                break;
            case self::DEFAULT_ADJUSTMENT;
            default:
                $this->adjustment = new DefaultLuckAdjustment();
                break;
        }
    }

    /**
     * Get name of selected adjustment algorithm
     * @return string
     */
    public function getAdjustment() : string
    {
        return $this->adjustment->getName();
    }

    /**
     * Update luck based on percentage of roll outcome
     * @param float $rollPercent min 0 to max 1
     */
    public function update(float $rollPercent = 0.5) : void
    {
        $this->luck += $this->adjustment->run($this->luck, $rollPercent);
    }

    /**
     * Gets luck
     * @return int
     */
    public function get() : int
    {
        return $this->luck;
    }

    /**
     * Sets luck
     * @param int $luck
     */
    public function set(int $luck) : void
    {
        $this->luck = $luck;
    }

    /**
     * Modifies a number based on current luck
     * @param int $number
     * @return int
     */
    public function modify(int $number) : int
    {
        if($this->active){
            $number *= $this->getApplicablePercent();

            return (int) round($number, 0,PHP_ROUND_HALF_UP);
        }

        return $number;
    }

    /**
     * Get applicable luck as random percentage based on current luck
     * @return float
     */
    public function getApplicablePercent() : float
    {
        if($this->luck < 0){
            return 1 - mt_rand(0, abs($this->luck)) * .01;
        } else if($this->luck == 0){
            return 1;
        }

        return 1 + mt_rand(0, abs($this->luck)) * .01;
    }
}