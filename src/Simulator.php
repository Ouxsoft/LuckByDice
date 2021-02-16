<?php

namespace Ouxsoft\LuckByDice;

class Simulator
{
    private $notation = '';
    private $expressions = [];
    private $dice = [];

    public function __construct(
        \DiceNotation $diceNotation,
        \Luck $luck
    )
    {
        $this->diceNotation = $diceNotation;
        $this->luck = $luck;
    }

    /**
     * @param string ...$diceNotations
     */
    public function addDice(string ...$diceNotations) : void
    {
        foreach($diceNotations as $diceNotation){
            $dice = $this->notation->parse($diceNotation);

            $this->dice[] = $dice;
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