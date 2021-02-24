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

interface LuckInterface
{
    public function __construct(int $luck = 0);

    public function update($rollOutcome, $rollMax): void;

    public function getPhi(): float;

    public function get(): int;

    public function set(int $luck): void;
}