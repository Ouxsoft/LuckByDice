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

namespace Ouxsoft\LuckByDice\Contract;

use Ouxsoft\LuckByDice\Dice;

interface OutcomeInterface
{

    public function __construct(array $dice);

    public function getMin(): int;

    public function setMin(int $min): void;

    public function getMax(): int;

    public function setMax(int $max): void;

    public function setDice(Dice $die) : void;

    public function getDice() : array;

}


