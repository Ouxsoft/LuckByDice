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

use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Luck;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Factory\Container;

/**
 * Interface AbstractFactoryInterface
 * @package Ouxsoft\LuckByDice\Contract
 */
interface AbstractFactoryInterface
{
    public function makeCup(): Cup;

    public function makeNotation(Container $container): Notation;

    public function makeLuck(): Luck;
}
