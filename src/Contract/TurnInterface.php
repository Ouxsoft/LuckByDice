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
    public function getLuck(): int;
    public function setLuck(int $luck);
    public function setLimitMinRoll(bool $limitMinRoll): void;
    public function getLimitMinRoll(): bool;
    public function setLimitMaxRoll(bool $limitMaxRoll): void;
    public function getLimitMaxRoll(): bool;
    public function roll(): int;
    public function getMinPotential(): int;
    public function getMaxPotential(): int;
    public function getCup(): Cup;
    public function getNotation(): string;
    public function __toString(): string;
}
