<?php

namespace Ouxsoft\LuckByDice;

class Simulator
{
    private $dice = [];

    /**
     * @param string ...$diceNotations
     */
    public function addDice(string ...$diceNotations) : void
    {
        foreach($diceNotations as $diceNotation){
            $die = new SingleDie();

            $dice[] = $die;
        }
    }

    /**
     * @param string ...$diceNotations
     */
    public function removeDice(string ...$diceNotations) : void
    {
        foreach($diceNotations as $diceNotations){

        }
    }
}