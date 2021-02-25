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

use Ouxsoft\LuckByDice\Turn;

class TurnFactory
{
    /**
     * @param string|null $notation
     * @return Turn
     */
    public static function getInstance(string $notation = null): Turn
    {
        $abstractFactory = new ConcreteFactory();

        $container = ContainerFactory::buildContainer($abstractFactory);

        return new Turn(
            $container['notation'],
            $container['cup'],
            $container['luck'],
            $notation
        );
    }
}
