<?php
/*
 * This file is part of the LuckByDice package.
 *
 * (c) 2020-2021 Ouxsoft <contact@ouxsoft.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ouxsoft\LuckByDice\Contract;

interface CollectionInterface
{
    public function __construct(int $amount, int $sides, int $modifier = 1, int $multiplier = 1);
    public function count(): int;
    public function roll(): int;
    public function getDice(): array;
    public function getValue(): int;
    public function getTotal(): int;
    public function getModifier(): int;
    public function getMultiplier(): int;
    public function getSides(): int;
    public function getMinOutcome(): int;
    public function getMaxOutcome(): int;
    public function getOutcomePercent(): float;
    public function getMinPotential(): int;
    public function getMaxPotential(): int;
    public function getNotation(): string;
}
