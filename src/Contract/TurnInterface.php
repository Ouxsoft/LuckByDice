<?php

namespace Ouxsoft\LuckByDice\Contract;

use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Parser;
use Ouxsoft\LuckByDice\Luck;

interface TurnInterface
{
    public function __construct(
        Notation $notation,
        Cup $cup,
        Luck $luck,
        string $expression = null
    );

    public function setNotation(string $notation) : void;

    public function getNotation() : string;

    public function getLuck() : int;

    public function setLuck(int $luck);

    public function roll() : int;

    public function __toString() : string;
}
