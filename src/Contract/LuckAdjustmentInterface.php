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

interface LuckAdjustmentInterface
{
    public function setMax(int $max): void;
    public function setMin(int $min): void;
    public function run(int $luck, float $rollPercent = 0.5): int;
}