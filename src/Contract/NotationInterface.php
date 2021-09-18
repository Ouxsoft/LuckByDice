<?php

namespace Ouxsoft\LuckByDice\Contract;

use Ouxsoft\LuckByDice\Collection;
use Ouxsoft\LuckByDice\Cup;

interface NotationInterface
{
    public function __construct(Cup $cup);

    public function set(string $notation) : void;

    public function get() : string;

    public function setSeparator(string $separator) : void;

    public function getSeparator() : string;

    public function __toString () : string;
}
