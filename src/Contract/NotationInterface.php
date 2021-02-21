<?php

namespace Ouxsoft\LuckByDice\Contract;

use Ouxsoft\LuckByDice\Cup;

interface NotationInterface
{
    public function encode(Cup $cup) : string;
    public function decode(string $expression) : Cup;
}