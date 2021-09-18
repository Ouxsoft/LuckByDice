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
use Ouxsoft\LuckByDice\Factory\TurnFactory;
use Ouxsoft\LuckByDice\LuckAdjustment\AbstractLuckAdjustment;
use Ouxsoft\LuckByDice\LuckAdjustment\DefaultLuckAdjustment;
use Ouxsoft\LuckByDice\LuckAdjustment\FickleLuckAdjustment;
use Ouxsoft\LuckByDice\Notation;
use Ouxsoft\LuckByDice\Cup;
use Ouxsoft\LuckByDice\Luck;

class ConcreteFactory implements AbstractFactoryInterface
{
    /**
     * @return Cup
     */
    public function makeCup(): Cup
    {
        return new Cup();
    }

    /**
     * @param Container $container
     * @return Notation
     */
    public function makeNotation(Container $container): Notation
    {
        return new Notation($container['cup']);
    }

    /**
     * @return Luck
     */
    public function makeLuck(): Luck
    {
        return new Luck();
    }

}
