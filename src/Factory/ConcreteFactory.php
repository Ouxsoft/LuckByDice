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

namespace Ouxsoft\LuckByDice\Factory;

use Ouxsoft\LuckByDice\Contract\AbstractFactoryInterface;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Luck;

class ConcreteFactory implements AbstractFactoryInterface
{
    public function makeNotation(): Notation
    {
        return new Notation();
    }

    public function makeCup(): Cup
    {
        return new Cup();
    }

    public function makeLuck(): Luck
    {
        return new Luck();
    }
}
