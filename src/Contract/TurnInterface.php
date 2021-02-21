<?php

namespace Ouxsoft\LuckByDice\Contract;

use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Parser;

interface TurnInterface
{

    public function __construct(
        Notation $notation,
        Cup $cup,
        string $expression = null
    );

    public function set(string $expression) : void;

    public function roll() : int;

    public function __toString() : string;

}