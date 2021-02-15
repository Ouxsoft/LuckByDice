<?php

namespace Ouxsoft\LuckByDice;

class Simulator
{
    private $dice = [];

    /**
     * @param string ...$dice
     */
    public function addDice(string ...$dice) : void
    {
        foreach($dice as $singleDie){
            $die = new SingleDie();

            $dice[] = $die;
        }
    }

    /**
     * @param string ...$dice
     */
    public function removeDice(string ...$dice) : void
    {
        foreach($dice as $singleDice){

        }
    }
}