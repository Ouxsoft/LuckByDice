<?php

namespace Ouxsoft\LuckByDice;

/**
 * Class ExpressionParser
 * @package Ouxsoft\LuckByDice
 */
class ExpressionParser
{
    public $amount;
    public $slides;
    public $modifier;
    public $multiplier;

    /**
     * Expression constructor.
     * @param string|null $expression
     */
    public function __construct(string $expression = null)
    {
        if($expression !== null){
            $this->setByString($expression);
        }
    }

    /**
     * @param string $expression
     */
    public function setByString(string $expression) : void
    {
         $parts = preg_split('/(\d+)?d(\d+)([\+\-]\d+)?/',$expression);
         var_dump($parts);
    }

    /**
     * @param int $amount
     * @param int $slides
     * @param int $modifier
     * @param int $multiplier
     */
    public function setByValues($amount = 1, $slides = 1, $modifier = 0, $multiplier = 1) : void
    {
        $this->amount = $amount;
        $this->slides = $slides;
        $this->modifier = $modifier;
        $this->multiplier = $multiplier;
    }

    /**
     * @return int
     */
    public function parser() : int
    {
        $total = 0;

        for($i = 0; $i <= $this->amount; $i++) {
            $total = rand(1, $this->slides);
        }

        $total += $this->modifier;
        $total *= $this->multiplier;

        return $total;
    }
}