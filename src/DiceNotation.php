<?php

use Ouxsoft\LuckByDice;

/**
 * Class DiceNotation
 */
class DiceNotation
{
    /**
     * DiceNotation constructor.
     * @param string|null $diceNotation 3d6×10+3+5d8
     */
    public function __construct(?string $diceNotation)
    {
        if(isset($diceNotation)){
            $this->parse($diceNotation);
        }
    }

    /**
     * @param $diceNotation 3d6×10+3+5d8
     */
    public function parse($diceNotation)
    {

    }
}

/*

A is the number of dice to be rolled (usually omitted if 1).
X is the number of faces of each dice.

2d6+1d8),

Though this usage is less common. Additionally, notation such as AdX−L is not uncommon, the "L" (or "H", less commonly)
being used to represent "the lowest result" (or "the highest result"). For instance, 4d6−L means a roll of 4 six-sided
dice, dropping the lowest result.

1d6×5 or 5×d6 means "roll one 6-sided die, and multiply the result by 5."
3d6×10+3 means "roll three 6-sided dice, add them together, multiply the result by 10, and then add 3."


1d6×5 or 5×d6 means "roll one 6-sided die, and multiply the result by 5."
3d6×10+3 means "roll three 6-sided dice, add them together, multiply the result by 10, and then add 3."

*/
