<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Ouxsoft\LuckByDice;

/**
 * Class Turn
 * @package Ouxsoft\LuckByDice
 */
class Turn
{
    /**
     * @var Cup
     */
    private $cup;
    /**
     * @var Parser
     */
    private $parser;
    /**
     * @var int
     */
    private $total;

    /**
     * Expression constructor.
     * @param Parser $parser
     * @param Cup $cup
     * @param string|null $expression
     * @see Turn::setByString()
     */
    public function __construct(
        Parser $parser,
        Cup $cup,
        string $expression = null
    ) {
        $this->parser = $parser;
        $this->cup = $cup;

        if ($expression !== null) {
            $this->set($expression);
        }
    }

    /**
     * @param string $expression "1d4+3*2,1d5,d5,10d5"
     */
    public function set(string $expression) : void
    {
        $this->cup = $this->parser->run($expression);
    }

    /**
     * Roll each dice group and total
     * @return int
     */
    public function roll() : int
    {
        $total = 0;

        foreach ($this->cup as $diceGroup) {
            $total += $diceGroup->roll();
        }

        $this->total = $total;

        return $this->total;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return (string) $this->total;
    }
}
