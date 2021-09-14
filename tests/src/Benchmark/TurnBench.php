<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2017-2021 Ouxsoft  <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDiceTests\Benchmark;

use Ouxsoft\LuckByDice\Factory\TurnFactory;

class TurnFactoryBench
{
    /**
     * Test a small roll
     * @Revs(1000)
     * @Iterations(5)
     */
    public function bench1D6() {
        $notation = '1d6';
        $turn = TurnFactory::getInstance();
        $turn->notation->set($notation);
        $turn->roll();
    }

    /**
     * Test rolling 1000d6
     * @Revs(1000)
     * @Iterations(5)
     */
    public function bench1000d6() {
        $notation = '1000d6';
        $turn = TurnFactory::getInstance();
        $turn->notation->set($notation);
        $turn->roll();
    }

    /**
     * Test rolling a 100d6,100d8,100d10
     * @Revs(1000)
     * @Iterations(5)
     */
    public function bench100D6100D8100D10() {
        $notation = '100d6,100d8,100d10';
        $turn = TurnFactory::getInstance();
        $turn->notation->set($notation);
        $turn->roll();
    }

    /**
     * Test rolling a 100d6+10*100
     * @Revs(1000)
     * @Iterations(5)
     */
    public function bench100D6Plus10Multiply100() {
        $notation = '100d6+10*100';
        $turn = TurnFactory::getInstance();
        $turn->notation->set($notation);
        $turn->roll();
    }
}
