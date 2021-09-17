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
     * @var Turn
     */
    private $turn;

    public function setUp() : void
    {
        $this->turn = TurnFactory::getInstance();
    }

    public function tearDown() : void
    {
        unset($this->turn);
    }

    // 20000 microseconds = 0.02 seconds
    /**
     * @BeforeMethods("setUp")
     * @AfterMethods("tearDown")
     * @ParamProviders({"provideNotations"})
     * @Assert("mode(variant.time.avg) < 20000")
     * @Assert("mode(variant.mem.peak) < 2000000")
     * @Iterations(10)
     * @Revs(5)
     * @OutputTimeUnit("seconds")
     */
    public function benchTurn($params)
    {
        $this->turn->setNotation($params['notation']);
        $this->turn->roll();
    }

    public function provideNotations() : array
    {
        $data = [];

        $sides = [2,3,4,6,8,10,12,20,100];
        foreach($sides as $i){
            $notations = [
                "1d{$i}",
                "1d{$i},{$i}d{$i}",
                "1d{$i},{$i}d{$i},{$i}d{$i}+{$i}",
                "1d{$i},{$i}d{$i},{$i}d{$i}+{$i},{$i}d{$i}+{$i}*{$i}"
            ];
            foreach($notations as $notation){
                $data[] = ['notation' => $notation];
            }
        }
        return $data;
    }

}


