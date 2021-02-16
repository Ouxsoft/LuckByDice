<?php

use Ouxsoft\LuckByDice;

class Luck
{
    private $luck;

    public function get() : int
    {
        return $this->luck;
    }

    public function set(int $luck) : void
    {
        $this->luck = $luck;
    }
}