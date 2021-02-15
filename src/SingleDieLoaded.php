<?php

namespace Ouxsoft\LuckByDice;

/**
 * Class LoadedDice
 * A loaded dice is one that has been weighted to always have the same outcome
 * @package Ouxsoft\LuckByDice
 */
class LoadedDie
{
    public $slides;
    public $material = 'Default';
    public $loaded_side;

    public function throw(){
        return $this->loaded_value;
    }
}