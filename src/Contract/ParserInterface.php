<?php

namespace Ouxsoft\LuckByDice\Contract;

interface ParserInterface
{

    public function run($expression) : array;

}